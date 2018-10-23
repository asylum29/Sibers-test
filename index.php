<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= $CONFIG->wwwroot . "/css/styles.css"; ?>">
    <link rel="stylesheet" href="<?= $CONFIG->wwwroot . "/css/bootstrap.min.css"; ?>">
    <script type="text/javascript" src="<?= $CONFIG->wwwroot . "/js/jquery-3.1.1.min.js"; ?>"></script>
    <script type="text/javascript" src="<?= $CONFIG->wwwroot . "/js/bootstrap.min.js"; ?>"></script>
    <script type="text/javascript" src="<?= $CONFIG->wwwroot . "/js/mustache.js"; ?>"></script>
    <script type="text/javascript" src="<?= $CONFIG->wwwroot . "/js/main.js"; ?>"></script>
    <title>Sibers-test</title>
</head>
<body data-wwwroot="<?= $CONFIG->wwwroot; ?>">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Sibers-test</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div id="content">
            <form>
                <div class="row">
                    <div class="form-group col-md-5">
                        <input type="text" name="q" class="form-control" placeholder="Enter search query">
                    </div>
                    <div class="col-md-7">
                        <button id="searchbtn" type="submit" class="btn btn-default">Search</button>
                    </div>
                </div>
            </form>
            <hr />
            <div id="searchresults">
                <div id="error" class="alert alert-danger" style="display: none;">
                    An error occurred in the last search
                </div>
                <div id="loading" class="alert alert-info" style="display: none;">
                    Please, wait...
                </div>
                <div id="list" class="list-group">
                    <script id="restmpl" type="text/html">
                        {{#list.length}}
                        <h4>Search results</h4>
                        {{#list}}
                        <a href="{{link}}" class="list-group-item" target="_blank">
                            {{title}}<br /><small class="text-muted">{{snippet}}</small>
                        </a>
                        {{/list}}
                        {{/list.length}}
                        {{^list.length}}
                        <div class="list-group-item">
                            <h4>Not found</h4>
                        </div>
                        {{/list.length}}
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
