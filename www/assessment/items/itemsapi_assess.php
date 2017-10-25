<?php
// session is started by header.php
session_start();
if (!isset($_SESSION['itemID'])) {
    $_SESSION['itemID'] = "Bootcamp2017Activity";
}
$activity_id = $_SESSION['itemID'];

include_once '../../config.php';
include_once 'includes/header.php';

use LearnositySdk\Request\Init;
use LearnositySdk\Utils\Uuid;

$security = array(
    'consumer_key' => $consumer_key,
    'domain' => $domain
);

// Get items belongs to
require 'dataapi/data_endpoints.php';
$activities_output = getActivitiesByActivityID($activity_id);
//echo json_encode($activities_output);
if (count($activities_output['data']) <= 0) {
    echo "<font color='red'>Unable to find activity specified</font><br><br>";
} else {
    $items = $activities_output['data'][0]['data']['items'];
}

$sessionid = Uuid::generate();
$request = [
    'activity_id' => $activity_id,
    'name' => 'Accessment',
    'rendering_type' => 'assess',
    'state' => 'initial',
    'type' => 'submit_practice',
    'session_id' => $sessionid,
    'user_id' => $studentid,
    'items' => $items,
    'config' => [
        'title' => $activity_id.' - Assessment',
        'regions' => [
            'top-left' => [
                [
                    'type' => 'title_element'
                ],
                [
                    'type' => 'header_element',
                    'default_label_option' => 'regionHeaderTopLeft'
                ]
            ],
            'top-right' => [
                [
                    'type' => 'pause_button',
                    'position' => 'right'
                ],
                [
                    'type' => 'timer_element'
                ],
                [
                    'type' => 'reading_timer_element'
                ],
                [
                    'type' => 'itemcount_element'
                ],
                [
                    'type' => 'header_element',
                    'default_label_option' => 'regionHeaderTopRight'
                ]
            ],
            'items' => [
                [
                    'type' => 'slider_element'
                ],
                [
                    'type' => 'progress_element'
                ],
                [
                    'type' => 'header_element',
                    'default_label_option' => 'regionHeaderItems'
                ]
            ],
            'right' => [
                [
                    'type' => 'verticaltoc_element'
                ],
                [
                    'type' => 'save_button'
                ],
                [
                    'type' => 'fullscreen_button'
                ],
                [
                    'type' => 'reviewscreen_button'
                ],
                [
                    'type' => 'accessibility_button'
                ],
                [
                    'type' => 'calculator_button'
                ],
                [
                    'type' => 'flagitem_button'
                ],
                [
                    'type' => 'header_element',
                    'default_label_option' => 'regionHeaderRight'
                ]
            ],
            'bottom-right' => [
                [
                    'type' => 'next_button'
                ],
                [
                    'type' => 'previous_button'
                ],
                [
                    'type' => 'header_element',
                    'default_label_option' => 'regionHeaderBottomRight'
                ]
            ]
        ],
        'navigation' => [
            'show_progress' => false,
            'show_intro' => true,
            'show_outro' => true,
            'show_title' => true,
            'skip_submit_confirmation' => false,
            'warning_on_change' => false,
            'show_acknowledgements' => true,
            'auto_save' => [
                'ui' => false,
                'saveIntervalDuration' => 500
            ],
            'item_count' => [
                'question_count_option' => false
            ]
        ],
        'time' => [
            'max_time' => 1500,
            'limit_type' => 'soft',
            'warning_time' => 120
        ],
        'configuration' => [
            'shuffle_items' => false,
            'lazyload' => false,
            'fontsize' => 'normal',
            'onsubmit_redirect_url' => 'itemsapi_assess.php',
            'onsave_redirect_url' => 'itemsapi_assess.php',
            'ondiscard_redirect_url' => 'itemsapi_assess.php',
            'idle_timeout' => [
                'interval' => 300,
                'countdown_time' => 60
            ],
            'submit_criteria' => [
                'type' => 'attempted'
            ]
        ],
        'questions_api_init_options' => [
            'beta_flags' => [
                'reactive_views' => true
            ]
        ]
    ]
];


include 'utils/settings-override.php';

$Init = new Init('items', $security, $consumer_secret, $request);
$signedRequest = $Init->generate();

?>

<div class="jumbotron section">
    <div class="toolbar">
        <ul class="list-inline">
            <li data-toggle="tooltip" data-original-title="Customise API Settings"><a href="#" class="text-muted" data-toggle="modal" data-target="#settings"><span class="glyphicon glyphicon-list-alt"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Preview API Initialisation Object"><a href="#" data-toggle="modal" data-target="#initialisation-preview"><span class="glyphicon glyphicon-search"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Visit the documentation"><a href="http://docs.learnosity.com/itemsapi/" title="Documentation"><span class="glyphicon glyphicon-book"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Toggle product overview box"><a href="#"><span class="glyphicon glyphicon-chevron-up jumbotron-toggle"></span></a></li>
        </ul>
    </div>

    <div class="overview">
        <h1>Assessment</h1>
        <!-- <h1>Items API – Assess</h1> -->
<!--
        <p>With the flick of a switch make the items into an assessment. Truly write once - use anywhere.
        <p>
        <p>Type ctrl+shift+m to open the Administration Panel. The default password is <em>password</em>.</p>
-->
        <div id="form">
            <label>Activity ID :</label>
            <input id="itemID" type="text" size="35" placeholder="Activity ID e.g. Bootcamp2017Activity">
            <input id="submit" type="button" value="Change">
            <span id="result">
                <i>&nbsp;current activity:
                    <?php
                    echo $_SESSION['itemID'];
                    ?>
                </i>
            </span>
      </div>
    </div>
</div>
<script src="getSessionVarItems.js"></script>
<div class="section">
    <div id="learnosity_assess"></div>
</div>
<script src="<?php echo $url_items; ?>"></script>
<script>

    var itemsApp = {};
    var currentRegions = <?php echo json_encode($request['config']['regions']);?>;
    var eventOptions = {
        readyListener: init,
        errorListener: function (event) {
            console.log("error:" + event);
        }
    };


    itemsApp = LearnosityItems.init(<?php echo $signedRequest; ?>, eventOptions);

    function init() {
        var assessApp = itemsApp.assessApp();

        assessApp.on('item:load', function () {
            console.log('Active item:', getActiveItem(this.getItems()));
        });

        assessApp.on('test:submit:success', function () {
            toggleModalClass();
        });

        // Uncomment if you don't want a warning when leaving the
        // page with unsaved changes
        // window.onbeforeunload = function () {
        //     return;
        // }
    }

    /**
     * Returns the active item if using the Assess API
     * @param  {object} items Object of all items currently loaded
     * @return {object}       Current active item
     */
    function getActiveItem(items) {
        for (var item in items) {
            if (items.hasOwnProperty(item) && items[item].active === true) {
                return items[item];
            }
        }
    }

    function toggleModalClass() {
        $('.modal-backdrop').css('display', 'none');
    }
</script>
<script type="text/javascript" src="regions_settings.js">
</script>
<?php
//include_once 'views/modals/settings-items2.php';
include_once 'views/modals/initialisation-preview.php';
include_once 'includes/footer.php';

?>
