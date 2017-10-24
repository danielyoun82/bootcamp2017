<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

include_once 'config.php';
include_once 'includes/header.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Learnosity Hello World - Plus!
    </title>
    <link rel="stylesheet" href="https://docs.learnosity.com/static/css/vendor/foundation/foundation-flex.css">
    <link rel="stylesheet" href="https://docs.learnosity.com/static/css/vendor/foundation/foundation.min.css">
    <link rel="stylesheet" href="https://docs.learnosity.com/static/css/app.css?bust=20170920">
    <link rel="stylesheet" href="https://docs.learnosity.com/js/vendor/highlight/styles/zenburn.css?bust=20170920">
</head>

<body class="lrn-2-col">
    <div class="lrn-site-wrapper">
      <h2>Learnosity product at a glance</h2>
        <section class="lrn-doc-section">
            <div class="lrn-doc-section-details" id="createItem">
                <h3 class="lrn-docs-h2">Create items</h3>
                <div class="lrn-row">
                    <div class="lrn-col-xs-12 lrn-col-sm-12 lrn-col-md-12 lrn-col-lg-10">
                        <div class="lrn-text-large"></div>
                        <p>
                            <a class="btn btn-primary btn-md" href="authoring/author/item-list.php" target="_blank">Demo</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="lrn-doc-section">
            <div class="lrn-doc-section-details" id="createActivity">
                <h3 class="lrn-docs-h2">Create an activity</h3>
                <div class="lrn-row">
                    <div class="lrn-col-xs-12 lrn-col-sm-12 lrn-col-md-12 lrn-col-lg-10">
                        <div class="lrn-text-large"></div>
                        <p>
                          <a class="btn btn-primary btn-md" href="authoring/author/activity-list.php" target="_blank">Demo</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="lrn-doc-section">
            <div class="lrn-doc-section-details" id="assess">
                <h3 class="lrn-docs-h2">Assessment</h3>
                <div class="lrn-row">
                    <div class="lrn-col-xs-12 lrn-col-sm-12 lrn-col-md-12 lrn-col-lg-10">
                        <div class="lrn-text-large"></div>
                        <p>
                            <a class="btn btn-primary btn-md" href="assessment/items/itemsapi_assess.php" target="_blank">Demo</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="lrn-doc-section">
            <div class="lrn-doc-section-details" id="report">
                <h3 class="lrn-docs-h2">Report</h3>
                <div class="lrn-row">
                    <div class="lrn-col-xs-12 lrn-col-sm-12 lrn-col-md-12 lrn-col-lg-10">
                        <div class="lrn-text-large"></div>
                        <p>
                            <a class="btn btn-primary btn-md" href="analytics/reports/report_types.php" target="_blank">Demo</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

<?php
    include_once 'includes/footer.php';
