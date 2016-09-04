<link href="<?php echo base_url() ?>assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
<!--<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />-->
<link href="<?php echo base_url() ?>assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
<link href="<?php echo base_url() ?>assets/css/main-style.css" rel="stylesheet" />
<!--<link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />-->

<!-- Core Scripts - Include with every page -->
<!--<script src="assets/plugins/jquery-1.10.2.js"></script>-->
<!--<script src="assets/plugins/bootstrap/bootstrap.min.js"></script>-->
<!--<script src="assets/plugins/morris/morris.js"></script>-->
<!--<script src="assets/scripts/dashboard-demo.js"></script>-->
<!--<script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>-->
<!--<script src="assets/plugins/pace/pace.js"></script>-->
<!--<script src="assets/scripts/siminta.js"></script>-->

<style>
    .list-dm {
        cursor:pointer;
        margin-left: -15%;
    }
    .list-dm:hover {
        background-color: lightgrey;
    }

    .panel-body ul {
        list-style-type: none;
    }

    .panel-body ul li {
        margin-left: -10%;
    }

    .rowColumnContainer {
        min-height: 28px;
        /*background-color: #f3d8d8;*/
    }

    .thumb {
        margin-bottom: -3px !important;
        margin-right: -3px !important;
    }

    .thumb-header {
        /*margin-top: 5px; */
    }

    .own-custom-modal {
        margin-top: 7%;
    }

    .drilldown {
        margin-top: 3%;
        margin-bottom: 7%;
        padding-left: 2%;
        padding-right: 2%;
    }

    .drilldown-draggable {
        cursor: pointer;
    }
</style>

<div class="wrapper" ng-controller="worksheetController">

    <!-- navbar side -->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <!-- drilldown -->
        <div class="row drilldown">
            <div class="col-md-12 col-lg-12 col-xl-12 col-xs-12">
                <button type="button" class="btn btn-primary btn-lg btn-block btn-success" ng-click="share()">Share it!</button>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-tasks fa-fw"></i>&nbsp;&nbsp;Drilldown Dimension
            </div>
            <div class="panel-body">
                <div class="list-group" >
                    <ul dnd-list="drillDownContainer" class="rowColumnContainer">
                        <li ng-repeat="item in drillDownContainerDummy"
                            dnd-draggable="item"
                            class="list-group-item list-dm">
                            {{item.data}}
                        </li>
                    </ul>

                    <ul>
                        <li ng-repeat="item in drillDownContainer">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="deleteDrillDown($index)">&times;</button>
                            {{item.data}}
                        </li>
                    </ul>

                    <!--<ul dnd-list="drillDownContainer" class="rowColumnContainer">-->
                        <!--<li ng-repeat="item in drillDownContainer"-->
                            <!--class="alert alert-info alert-dismissable"-->
                        <!--&gt;-->
                            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="deleteDrillDown($index)">&times;</button>-->
                            <!--{{item.data}}-->
                        <!--</li>-->
                    <!--</ul>-->
                </div>
            </div>
        </div>
        <!-- end of drilldown -->

        <!-- sidebar-collapse -->
        <div class="sidebar-collapse">
            <!-- Dimension -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-tasks fa-fw"></i>&nbsp;&nbsp;Dimension
                </div>

                <div class="panel-body">
                    <!--<div class="list-group" ng-repeat="list in dimensionList">-->
                    <div class="list-group" >
                        <ul dnd-list="dimensionList">
                            <li ng-repeat="item in dimensionList"
                                dnd-draggable="item"
                                dnd-effect-allowed="copy"
                                class="list-group-item list-dm" >
                                {{item.data}}
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <!--End Dimension-->

            <!-- Measure -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>&nbsp;&nbsp;Measure
                </div>

                <div class="panel-body">
                    <div class="list-group">
                        <ul dnd-list="measureList">
                            <li ng-repeat="item in measureList"
                                dnd-draggable="item"
                                dnd-effect-allowed="copy"
                                class="list-group-item list-dm" >
                                {{item.data}}

                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            {{measureType[$index]}}
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li ng-repeat="type in typeList">
                                                <a href="" ng-click="changeMeasure(item,$index)">{{type}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!--<div class="btn-group pull-right">-->
                                    <!--<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">-->
                                        <!--{{measureType[$index]}}&nbsp;<i class="fa fa-chevron-down"></i>-->
                                    <!--</button>-->
                                    <!--<ul class="dropdown-menu slidedown">-->
                                        <!--<li ng-repeat="type in typeList">-->
                                            <!--<a href="#" ng-click="changeMeasure($index)">{{type}}</a>-->
                                        <!--</li>-->
                                    <!--</ul>-->
                                <!--</div>-->

                                <!--<div class="dropdown">-->
                                    <!--<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">-->
                                        <!--{{measureType[$index]}}&nbsp;<i class="fa fa-chevron-down"></i>-->
                                        <!--<span class="caret"></span></button>-->
                                    <!--<ul class="dropdown-menu">-->
                                        <!--<li ng-repeat="type in typeList">-->
                                            <!--<a href="#" ng-click="changeMeasure($index)">{{type}}</a>-->
                                        <!--</li>-->
                                    <!--</ul>-->
                                <!--</div>-->
                            </li>
                            <!--<li ng-repeat="item in measureList"-->
                                <!--dnd-draggable="item"-->
                                <!--dnd-moved="measureList.splice($index, 1)"-->
                                <!--dnd-effect-allowed="move"-->
                                <!--class="list-group-item list-dm" >-->
                                <!--{{item}}-->
                            <!--</li>-->
                        </ul>
                    </div>
                </div>

            </div>
            <!--End Measure-->

        </div>
        <!-- end sidebar-collapse -->
    </nav>
    <!-- end navbar side -->

    <!--  page-wrapper -->
    <div id="page-wrapper">
        <div class="row">
            <!-- Page Header -->
            <div class="col-md-4 col-lg-4">

                <!--  Row container -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Dimension
                    </div>
                    <div class="panel-body" >
                        <ul dnd-list="dimensionContainer" class="rowColumnContainer">
                            <li ng-repeat="item in dimensionContainer"
                                class="alert alert-success alert-dismissable"
                            >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="deleteRow($index)">&times;</button>
                                {{item.data}}
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End row container-->
            </div>

            <div class="col-md-4 col-lg-4">
                <!--  Column container -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Measure
                    </div>
                    <div class="panel-body" >
                        <ul dnd-list="measureContainer" class="rowColumnContainer">
                            <li ng-repeat="item in measureContainer"
                                class="alert alert-info alert-dismissable"
                            >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="deleteCol($index)">&times;</button>
                                {{item.data}} <b>({{item.measure_type}})</b>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End column container-->
            </div>
            <!--End Page Header -->

            <!-- Chart thumbnail container -->
            <div class="col-md-4 col-lg-4 thumb-header">
                <div class="panel panel-default">
                    <div class="panel-body" >
                        <!-- thumbnail list -->
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-6 thumb" ng-repeat="item in chartListSystem">
                                <a class="thumbnail" href="#" ng-click="generateChart(0, $index)">
                                    <img class="img-responsive" src="{{item['url-thumbnail']}}" alt="{{item['type']}}">
                                </a>
                            </div>

                            <div class="col-lg-4 col-md-4 col-xs-6 thumb" ng-repeat="item in chartListLocal">
                                <a class="thumbnail" href="#" ng-click="generateChart(1, $index)">
                                    <img class="img-responsive" src="{{item['dataImage']}}" alt="{{item['type']}}">
                                </a>
                            </div>
                        </div>
                        <!-- End thumbnail list -->

                        <!-- Add chart Button -->
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xl-12 col-xs-12">
                                <button type="button" class="btn btn-outline btn-primary btn-lg btn-block btn-success" data-toggle="modal" data-target="#myModal" >Add Chart</button>
                                <button type="button" class="btn btn-outline btn-primary btn-lg btn-block btn-success" data-toggle="modal" data-target="#modalCombineChart" >Add Combine Chart</button>
                            </div>
                        </div>
                        <!-- End add chart button -->
                    </div>
                </div>
            </div>
            <!-- End chart thumbnail container -->
        </div>

        <!-- Chart container -->
        <div id="chartContainer">
        </div>
        <!-- End chart container -->
    </div>
    <!-- end page-wrapper -->

    <!-- Modal add custom chart -->
    <div class="modal fade own-custom-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Please fill necessary data for your custom chart</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Chart Type</label>
                        <select ng-model="addChartObj.chartType"
                                ng-options="item.label for item in chartType"
                                class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>URL to Chart (js file)</label>
                        <input type="file" id="jsInputFile">
                    </div>
                    <div class="form-group">
                        <label>URL to Thumbnail Image</label>
                        <input type="file" accept="image/*" id="imageInputFile">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label>Dimension quantity</label>
                            <input class="form-control" ng-model="addChartObj.dimensionQuantity">
                        </div>
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label>Measure quantity</label>
                            <input class="form-control" ng-model="addChartObj.measureQuantity">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-success" ng-click="addChart()" data-dismiss="modal">Add chart</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal -->

    <!-- Modal add combine chart -->
    <div class="modal fade own-custom-modal" id="modalCombineChart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="combineLabel">Please define dimension, measure, and chart type for combining chart</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!--dimension checkbox-->
                        <div class="form-group col-md-4 col-lg-4 col-xs-12">
                            <table>
                                <label>Dimension</label>
                                <tr ng-repeat="item in dimensionList">
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input
                                                type="checkbox"
                                                value="{{item.data}}"
                                                id="{{item.data}}"
                                                ng-model="addCombineChartObj.dummyDimension[item.data]"
                                                ng-change="storeCombineDimension(item)"
                                                > {{item.data}}
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--end of dimension checkbox-->

                        <!--measure checkbox-->
                        <div class="form-group col-md-4 col-lg-4 col-xs-12">
                            <table>
                                <label>Measure</label>
                                <tr ng-repeat="item in measureList">
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input
                                                    type="checkbox"
                                                    value="{{item.data}}"
                                                    id="{{item.data}}"
                                                    ng-model="addCombineChartObj.dummyMeasure[item.data]"
                                                    ng-change="storeCombineMeasure(item)"
                                                > {{item.data}}
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--end of measure checkbox-->

                        <div class="form-group col-md-4 col-lg-4 col-xs-12">
                            <select ng-model="addCombineChartObj.chartType"
                                    ng-options="item.label for item in chartType"
                                    class="form-control">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-success" ng-click="addCombineChart()" data-dismiss="modal">Combine chart</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal -->
</div>

<script>

</script>