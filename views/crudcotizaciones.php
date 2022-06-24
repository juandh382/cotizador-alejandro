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
                        <li><i class="fa fa-home"></i><a href="<?=base_url?>">Home</a></li>
                        <li><i class="fa fa-laptop"></i><a href="<?=base_url?>/Quote/showQuotesCRUD">CRUD
                                Cotizaciones</a></li>
                    </ol>
                </div>
            </div>

            <?php require_once 'includes/quotesTable.php'; ?>

            <div class="row mt-5 col-md-5" id="form-container">
                <div>
                    <?php require_once 'includes/crudquotesForm.php'; ?>
                </div>
            </div>
            <div class="col-md-5 excel-icon-container">
                Importar cotizaciones <br>
                <a href="<?=base_url?>/quoteSpreadSheet.php"><img src="<?=base_url?>/views/assets/img/excel-icon.png" alt="" class="quoteSpreadSheet-icon"></a>
            </div>
        </section>
    </section>
    <!--main content end-->
</section>
<!-- container section start -->

<!-- javascripts -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?=base_url?>/views/assets/js/custom/endpoints.js"></script>
<script src="<?=base_url?>/views/assets/js/custom/quotesCRUD.js"></script>