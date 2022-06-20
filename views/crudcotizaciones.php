<!-- container section start -->
<section id="container" class="">
    <?php require_once 'layout/header.php'; ?>
    <!--sidebar start-->
    <?php require_once 'layout/sidebar.php'; ?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row" id="breadcrumb-container">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-laptop"></i>Dashboard</li>
                    </ol>
                </div>
            </div>

            <?php require_once 'includes/quotesTable.php'; ?>
            </div>
            <div class="row mt-5" id="form-container">
                <div class="col-md-5">
                    <?php require_once 'includes/crudquotesForm.php'; ?>
                </div>
        </section>
        <div class="text-right">
        </div>
    </section>
    <!--main content end-->
</section>
<!-- container section start -->

<!-- javascripts -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?=base_url?>/views/assets/js/custom/endpoints.js"></script>
<script src="<?=base_url?>/views/assets/js/custom/quotesCRUD.js"></script>