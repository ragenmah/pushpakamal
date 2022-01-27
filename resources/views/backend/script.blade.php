<script>

let myChart= document.getElementById('mychart').getContext('2d');

let massPopChart= new Chart(myChart,{

  type:'pie',
  exportEnabled: true,

  data:{

  	labels:['For Sale','Sold Out' ],

  	datasets:[{

        label:'Status Breakdown',

  		data:[
       {{$total_active}},
      
       {{$total_sales}}
  		],

  		backgroundColor:[

           'rgb(255, 99, 71)',
           'rgb(255, 165, 0)'
           


  		],

        borderWidth:1,
  		hoverBorderWidth:2,
  		hoverBorderColor:'#000'



  	}],

  },

  options:{

 
  	title:{

  		display:true,
  		text:'Property Status',
  		fontSize:25
  	},

  	legend:{
       display:true,
  		position:'bottom'
  	},

  	 layout:{
 
   padding:0,

   margin:0


  	 }, 

  	

  }

});




let myChart2= document.getElementById('mychart2').getContext('2d');

let massPopChart2= new Chart(myChart2,{

  type:'doughnut',
  exportEnabled: true,

  data:{

  	labels:['Commercial','Residental' ],

  	datasets:[{

        label:'Status Breakdown',

  		data:[
       {{$total_commercial}},
      
       {{$total_residental}}
  		],

  		backgroundColor:[

            'rgb(60, 179, 113)',
           'rgb(106, 90, 205)'
           


  		],

        borderWidth:1,
  		hoverBorderWidth:2,
  		hoverBorderColor:'#000'



  	}],

  },

  options:{


  	title:{

  		display:true,
  		text:'Property Type',
  		fontSize:25
  	},

  	legend:{
       display:true,
  		position:'bottom'
  	},

  	 layout:{
 
   padding:0,

   margin:0


  	 }, 

  	

  }

});




$.ajax({
    url: '/admin/property_details',
    method: "GET",
    success: function(datas) {
    	//console.log(Array.isArray(data));
      var code = [];
      var price = [];
      var address = [];

    var myobj= JSON.parse(datas); // conversion from json to object

    var sarr=$.map(myobj,function(mobj){ // conversion from object to array
     
     return mobj;
    });

   
      $.each(sarr, function(i,obj){  
    console.log(obj);     
       code.push(obj.code);
       price.push(obj.price);
       address.push(obj.address);
      });

      var chartdata = {
        labels:code,

     
        datasets : [
          {
           label: 'Price Of Properties',


        backgroundColor:[

           'rgb(255, 99, 71)',
           'rgb(255, 165, 0)',
           'rgb(60, 179, 113)',
           'rgb(106, 90, 205)',
           'rgb(120, 120, 120)'


        ],

            borderWidth:1,
        hoverBorderWidth:2,
        hoverBorderColor:'#000',
            data: price


          }
        ],

      };

      

       

    

      var ctx = $("#mychart3");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,

         options:{


  	scales: {
        xAxes: [{
        	stacked: true,
            gridLines: {
                display:true
            },
             ticks: {
                    beginAtZero:true
                }
        }],
        yAxes: [{
            gridLines: {
                display:true
            } ,

             ticks: {
                    beginAtZero:true
                }  
        }]
    },

  		title:{

  		display:true,
  		text:'Cost Analysis Of Properties',
  		fontSize:25
  	},


  }
         
      


      });
    },
    error: function(data) {
      console.log(data);
    }
  });



</script>
