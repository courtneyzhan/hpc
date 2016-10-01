<html>
    <head>
        <!--CURRENTLY FUNCTIONAL. 
WHEN AT SCHOOL:
				REPLACE $dbhost WITH 10.42.68.102
				REPLACE $dbuser AND $dbpass WITH cdeod1
				REPLACE THE SQL QUERIES FOR EACH AREA
				THE TABLE NAME FOR AvgTemp IS AverageTemp(erature?)
				CHANGE COLOUR SCHEME - MIN, MAX, STOP, HOVER
				CELSIUS OR FAHRENHEIT?
				-->
				<!-- dependent on Internet
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
        <script src="http://code.highcharts.com/maps/highmaps.js"></script>
				-->
				
				<script src="js/jquery-3.1.0.js"></script>
        <script src="js/highmaps-5.0.js"></script>
				<!-- optional -->
				<script src="js/highmaps-exporting-5.0.js"></script>
    </head>
    <body>
    <?php

      $four = 4;
      
      $dbhost = 'localhost';
      $dbuser = 'root';
			$dbpass = '';
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
      if (mysqli_connect_errno()) {
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	  }
			mysqli_select_db($conn, 'weatherdata');

      //j01
			$sql = "SELECT AvgTemp FROM `j01` "; //order by currenttime asc
			$result = mysqli_query($conn, $sql);
			
			if(!$result) {
				die('Could not get data ' . mysql_error());
			}
			
			while( list($AverageTemp) = mysqli_fetch_row($result) ) {
				$j01 = "$AverageTemp";
			};
      //j02
			$sql = "SELECT AvgTemp FROM `j02` "; //order by currenttime asc
			$result = mysqli_query($conn, $sql);
			
			if(!$result) {
				die('Could not get data ' . mysql_error());
			}
			
			while( list($AverageTemp) = mysqli_fetch_row($result) ) {
				$j02 = "$AverageTemp";
			};
      //j03
			$sql = "SELECT AvgTemp FROM `j03` "; //order by currenttime asc
			$result = mysqli_query($conn, $sql);
			
			if(!$result) {
				die('Could not get data ' . mysql_error());
			}
			
			while( list($AverageTemp) = mysqli_fetch_row($result) ) {
				$j03 = "$AverageTemp";
			};
      //j04
			$sql = "SELECT AvgTemp FROM `j04` "; //order by currenttime asc
			$result = mysqli_query($conn, $sql);
			
			if(!$result) {
				die('Could not get data ' . mysql_error());
			}
			
			while( list($AverageTemp) = mysqli_fetch_row($result) ) {
				$j04 = "$AverageTemp";
			};
      //j05
			$sql = "SELECT AvgTemp FROM `j05` "; //order by currenttime asc
			$result = mysqli_query($conn, $sql);
			
			if(!$result) {
				die('Could not get data ' . mysql_error());
			}
			
			while( list($AverageTemp) = mysqli_fetch_row($result) ) {
				$j05 = "$AverageTemp";
			};
      //j06
			$sql = "SELECT AvgTemp FROM `j06` "; //order by currenttime asc
			$result = mysqli_query($conn, $sql);
			
			if(!$result) {
				die('Could not get data ' . mysql_error());
			}
			
			while( list($AverageTemp) = mysqli_fetch_row($result) ) {
				$j06 = "$AverageTemp";
			};
      //j07
			$sql = "SELECT AvgTemp FROM `j01` "; //order by currenttime asc
			$result = mysqli_query($conn, $sql);
			
			if(!$result) {
				die('Could not get data ' . mysql_error());
			}
			
			while( list($AverageTemp) = mysqli_fetch_row($result) ) {
				$j07 = "$AverageTemp";
			};
      //j08
			$sql = "SELECT AvgTemp FROM `j01` "; //order by currenttime asc
			$result = mysqli_query($conn, $sql);
			
			if(!$result) {
				die('Could not get data ' . mysql_error());
			}
			
			while( list($AverageTemp) = mysqli_fetch_row($result) ) {
				$j08 = "$AverageTemp";
			};
      //Head of House
			$sql = "SELECT AvgTemp FROM `j01` "; //order by currenttime asc
			$result = mysqli_query($conn, $sql);
			
			if(!$result) {
				die('Could not get data ' . mysql_error());
			}
			
			while( list($AverageTemp) = mysqli_fetch_row($result) ) {
				$hoh = "$AverageTemp";
			};
      //Grp 3
			$sql = "SELECT AvgTemp FROM `j01` "; //order by currenttime asc
			$result = mysqli_query($conn, $sql);
			
			if(!$result) {
				die('Could not get data ' . mysql_error());
			}
			
			while( list($AverageTemp) = mysqli_fetch_row($result) ) {
				$grp3 = "$AverageTemp";
			};
      //Grp 1 & 2
			$sql = "SELECT AvgTemp FROM `j01` "; //order by currenttime asc
			$result = mysqli_query($conn, $sql);
			
			if(!$result) {
				die('Could not get data ' . mysql_error());
			}
			
			while( list($AverageTemp) = mysqli_fetch_row($result) ) {
				$grp12 = "$AverageTemp";
			};

		?>
		
		<div id="container" style="height: 640px; min-width: 640px; max-width: 960px; margin: 0 auto"></div>

<script>

$(function() {

  // Initiate the chart
  $('#container').highcharts('Map', {
    title: {
      "text": "J Block Temperatures (℃)"
    },
    mapNavigation: {
      enabled: true
    },
    navigation: {
      buttonOptions: {
        enabled: true
      }
    },
		colorAxis: {
			type: 'linear',
			stops: [
				[0, '#bbe3e3'],
				[0.5, '#8DB6CC'],
				[0.9, '#64889E']
			],
		},
		
		plotOptions: {
        series: {
/*
            tooltip: {
                headerFormat: 'XXX',
                pointFormat: '{series.name}'
            }
*/
        }
    },

    series: [{
      dataLabels: {
        enabled: "true",
        color: '#FFFFFF',
        format: '{point.name}'
      },
      name: "Temperature",
      type: "map",
      states: {
          hover: {
              color: '#bbcfe3'
          }
      },
			tooltip: {
				valueSuffix: '℃',
			},
      data: [{
        "name": "Group 3<br>Staff Room",
        "value": <?php echo $grp3 ?>,
        "path": "M852,-993L992,-993,992,-827,852,-827,852,-993"
      }, {
        "name": "J08",
        "value": <?php echo $j08 ?>,
        "path": "M639,-998L838,-998,838,-774,639,-774,639,-998"
      }, {
        "name": "J07",
        "value": <?php echo $j07 ?>,
        "path": "M425,-1000L624,-1000,624,-776,425,-776,425,-1000"
      }, {
        "name": "J06",
        "value": <?php echo $j06 ?>,
        "path": "M213,-1002L412,-1002,412,-778,213,-778,213,-1002"
      }, {
        "name": "J05",
        "value": <?php echo $j05 ?>,
        "path": "M0,-905L199,-905,199,-635,0,-635,0,-905"
      }, {
        "name": "J04",
        "value": <?php echo $j04 ?>,
        "path": "M154,-607L364,-607,364,-383,154,-383,154,-607"
      }, {
        "name": "J03",
        "value": <?php echo $j03 ?>,
        "path": "M379,-607L578,-607,578,-383,379,-383,379,-607"
      }, {
        "name": "J02",
        "value": <?php echo $j02 ?>,
        "path": "M591,-607L790,-607,790,-383,591,-383,591,-607"
      }, {
        "name": "J01",
        "value": <?php echo $j01 ?>,
        "path": "M801,-608L1000,-608,1000,-385,801,-385,801,-608"
      }, {
        "name": "Group 1 & 2 Staff Room",
        "value": <?php echo $grp12 ?>,
        "path": "M218,-755L713,-755,713,-640,218,-640,218,-755"
      }, {
        "name": "Head of House Offices",
        "value": <?php echo $hoh ?>,
        "path": "M732,-753L985,-753,985,-646,732,-646,732,-753"
      }]
    }]
  });
});

</script>


</body>
</html>