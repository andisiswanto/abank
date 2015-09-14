<div id="myfirstchart" class="graph" style="height: 250px;"></div>

<script>
    new Morris.Bar({
      // ID of the element in which to draw the chart.
      element: 'myfirstchart',
      // Chart data records -- each entry in this array corresponds to a point on
      // the chart.
      data: [
        { tahun: 'tes', value: -20 },
        { tahun: 'tos', value: 10 },
        { tahun: '2010', value: 5 },
        { tahun: '2011', value: 5 },
        { tahun: '2012', value: 20 }
      ],
      // The name of the data record attribute that contains x-values.
      xkey: 'tahun',
      // A list of names of data record attributes that contain y-values.
      ykeys: ['value'],
      // Labels for the ykeys -- will be displayed when you hover over the
      // chart.
      labels: ['Value']
    });
</script>