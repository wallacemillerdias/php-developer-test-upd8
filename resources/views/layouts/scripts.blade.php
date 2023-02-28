@section('scripts')
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/tiny-slider.js "></script>
    <script src="assets/js/tobii.min.js "></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/switcher.js"></script>
    <script src="assets/js/plugins.init.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script type="application/javascript">
        $(document).ready(function () {
            $('#client').DataTable({
                language: {
                    url:"https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json",
                    search: '<div><h5>Faça sua pesquisa <strong>simplificada:</strong> cpf, estado, cidade, etc...</h5></div>'
                },
                dom: '<f<t>pi>',
            });
        });
    </script>

@stop
