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
      <section class="lrn-doc-section">
          <div class="lrn-doc-section-details" id="quickstart">
            <h2>Learnosity QuickStart Guide</h2>
              <div class="lrn-row">
                  <div class="lrn-col-xs-12 lrn-col-sm-12 lrn-col-md-12 lrn-col-lg-10">
                      <div class="lrn-text-large"></div>
                      <p> In this tutorial, we'll look at the workflow of Learnosity product at a simplest form and learn about it through interactive demostration.

                      </p>
                  </div>
              </div>
          </div>
      </section>
        <section class="lrn-doc-section">
            <div class="lrn-doc-section-details" id="createItem">
                <h3 class="lrn-docs-h2">Create items</h3>
                <div class="lrn-row">
                    <div class="lrn-col-xs-12 lrn-col-sm-12 lrn-col-md-12 lrn-col-lg-10">
                        <div class="lrn-text-large"></div>
                        <p>Creation of items that consists of Question and Feature is pre-requisite step to create an assessment to users.</p>
                        <p><i>User:</i> Teacher, Author</p>
                        <p><i>Action:</i> Please create few items that consists of Questions and Features</p>
                        <p><a class="btn btn-primary btn-md" href="authoring/author/item-list.php" target="_blank">Demo</a></p>
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
                        <p>Once items are prepared, activity is required to be created to allow student to participate in assessment</p>
                        <p><i>User:</i> Teacher, Author</p>
                        <p><i>Action:</i> Please create an activity based on items created earlier.</p>
                        <p><a class="btn btn-primary btn-md" href="authoring/author/activity-list.php" target="_blank">Demo</a></p>
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
                        <p>With activity that created, this allow students can now participate in assessment and submit is to Teacher/Author.</p>
                        <p><i>User:</i> Student</p>
                        <p><i>Action:</i> Please complete assessment that you've generated and submit it for result, activity id can be changed dynamically from the demo page</p>
                        <p><a class="btn btn-primary btn-md" href="assessment/items/itemsapi_assess.php" target="_blank">Demo</a></p>
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
                        <p>Once assessment has been completed and submitted, it is scored in the backend, so that report can be generated for Teacher/Author to review Student's progress</p>
                        <p><i>User:</i> Teacher, Author</p>
                        <p><i>Action:</i> Please check report and see how you went with your assessment, activity id can be changed dynamically from the demo page</p>
                        <p><a class="btn btn-primary btn-md" href="analytics/reports/report_types.php" target="_blank">Demo</a></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

<?php
    include_once 'includes/footer.php';
