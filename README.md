PHP Highcharts
==============

[![Build Status](https://secure.travis-ci.org/misd-service-development/php-highcharts.png?branch=master)](http://travis-ci.org/misd-service-development/php-highcharts)

*This library is currently under development.*

Allows the programmatic creation of [Highcharts](http://www.highcharts.com/) in PHP.

Authors
-------

* Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>

Requirements
------------

* [Highcharts](http://www.highcharts.com/)

Installation
------------

 1. Add the bundle to your dependencies:

        // composer.json

        {
           // ...
           "require": {
               // ...
               "misd/highcharts": "dev-master"
           }
        }

 2. Use Composer to download and install the bundle:

        $ php composer.phar update misd/highcharts

Usage
-----

Create a chart:

    $chart = Chart::factory()
        ->setTitle('Scatter plot with regression line')
        ->addSeries(
            array(
                ScatterSeries::factory()
                    ->setName('Observations')
                    ->addData(array(1, 1.5, 2.8, 3.5, 3.9, 4.2)),
                LineSeries::factory()
                    ->setName('Regression line')
                    ->addDataPoint(DataPoint::factory(0, 1.11))
                    ->addDataPoint(DataPoint::factory(5, 4.51))
                    ->getMarker()->setEnabled(false)->getSeries()
                    ->setEnableMouseTracking(false),
            )
        )
    ;

Then render it:

    <?php $renderer = new Renderer(); ?>

    <script type="text/javascript">
        $(function () {
            <?php echo $renderer->render($chart); ?>
        });
    </script>

    <?php echo $renderer->renderContainer($chart); ?>

Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the [GitHub issue tracker](https://github.com/misd-service-development/php-highcharts/issues).
