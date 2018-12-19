@extends('spravovanie.index')
@section('supercontent')



        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

            // Load the Visualization API and the corechart package.
            google.charts.load('current', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Druhy');
                data.addColumn('number', 'Pocet');
                data.addRows([

                        @foreach($druhy as $druh)
                    ['{{$druh->nazov}}', {{$druh->pocet}}],

                        @endforeach


                ]);

                // Set chart options
                var options = {'title':'Druhy inzerátov:',
                    backgroundColor: '#eeeeee',
                    'width':500,
                    'height':400};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);






            }







        </script>

<script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Kraje');
        data.addColumn('number', 'Pocet');
        data.addRows([

                @foreach($kraje as $kraj)
            ['{{$kraj->nazov}} kraj', {{$kraj->pocet}}],

            @endforeach


        ]);

        // Set chart options
        var options = {'title':'Inzeráty podľa krajov:',
            backgroundColor: '#eeeeee',
            'width':500,
            'height':400};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);






    }







</script>



<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Email', 'Počet inzerátov', { role: 'style' } ],

                    @foreach($makleri as $makler)



                ['{{$makler->email}}', {{$makler->pocet}}, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2'],

            @endforeach
        ]);


        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },
            2]);

        var options = {
            title: "Top 10 maklérov podľa počtu inzerátov:",
            backgroundColor: '#eeeeee',
            width: 1000,
            height: 400,
            bar: {groupWidth: "75%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
    }
</script>












<table align="center">
    <tr valign="top">
        <td style="width: 50%;">
            <div  id="chart_div"></div>

        </td>
        <td style="width: 50%;">
            <div  id="chart_div2"></div>


        </td>
    </tr>
    <tr>
        <td colSpan=2>
            <div id="barchart_values" style="width: 900px; height: 300px;"></div>



        </td>
    </tr>



</table>



<br><br><br><br>



@endsection