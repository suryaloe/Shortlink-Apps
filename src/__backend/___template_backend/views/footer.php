


    </div>

    <footer class="app-footer">
        <a href="http://suryaloe.id">ShortcutLoe</a> © 2017 PT Lintas Muda Intermedia.
        <span class="float-right">Powered by <a href="http://suryaloe.id">ShortcutLoe</a>
        </span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="<?= ASSETSADMIN_URL; ?>bower_components/jquery/dist/jquery_1.10.2.min.js"></script>
    <script src="<?= ASSETSADMIN_URL; ?>bower_components/tether/dist/js/tether.min.js"></script>
    <script src="<?= ASSETSADMIN_URL; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= ASSETSADMIN_URL; ?>bower_components/pace/pace.min.js"></script>


    <!-- Plugins and scripts required by all views -->
    <?php if ($title == "Dashboard - Link Shortcut Apps"){ ?>
    <script src="<?= ASSETSADMIN_URL; ?>bower_components/chart.js/dist/Chart.min.js"></script>
    <?php } ?>


    <!-- GenesisUI main scripts -->

    <script src="<?= ASSETSADMIN_URL; ?>js/app.js"></script>





    <!-- Plugins and scripts required by this views -->

    <!-- Custom scripts required by this view -->
    <?php if ($title == "Dashboard - Link Shortcut Apps"){ ?>
    <script src="<?= ASSETSADMIN_URL; ?>js/views/main.js"></script>
    <?php } ?>
    <?php if (isset($script_js)) { echo $script_js; } ?>
    <script src="<?= ASSETSADMIN_URL; ?>js/controller.js?v=1.0.0"></script>

</body>

</html>