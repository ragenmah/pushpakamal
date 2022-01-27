
$(document).ready(() => {
    
    $("#sortBy").on("change", function (e) {
        // sortFor=$(".aa-tag").text();
        
        sortFor=$(".sortForClass").attr("value");
        if(sortFor=="Search")
        sortfor=$(".aa-tag").attr("value");
        else
        sortfor=sortFor;
      
   
    // console.log("sort for"+(sortFor));
        // console.log(e);
        var sortingValue = e.target.value;
        fetchSortingValue(sortingValue,sortFor );
    });

    function fetchSortingValue(value,sortFor) {
        const base = new URL('/', location.href).href;
        $.ajax({
            type: "GET",
            url: "sortby?sortby=" + value+"&sortFor="+sortFor,
            dataType: "json",
            success: function (response) {
                console.log(response.sortdata);
              
                // console.log(response);
                $('.sort-data').html("");
                var result = response;
                $.each(result.data,function(key,sortItem){                    
                    //  console.log(sortItem.id);
                  var  prop_price=sortItem.price;
                    
                   var price =prop_price.toString().replace(/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/g, '$1,');
                //    /(\d)(?=(\d\d\d)+(?!\d))/i
                    $(".sort-data").append('<div class="col-md-4">'+
                    "<article class='aa-properties-item'>"+
                        "<a href="+base+"property/"+sortItem.id+" class='aa-properties-item-img'>"+
                            "<img src="+base+"uploads/slider/"+sortItem.image+" +"+"alt='img'"+
                               " style='width: 100%; height:200px;'>"+
                        "</a>"+
                        
                        ((sortItem.property_status=='For Rent')?
                        "<div class='aa-tag for-rent'>"+"For Rent"+"</div>"
                       :"<div class='aa-tag for-sale'>"+"For Sale"+"</div>")+
                       "<div class='aa-properties-item-content'>"+
                       "<div class='aa-properties-code'>"+
                           "<a href="+base+"property/"+sortItem.id+">"+
                               "<h4><i class='fas fa-map-marker-alt'></i>&nbsp; "+sortItem.address+" "+
                             '  </h4>'+
                           "</a>"+
                       "</div>"+
                      ' <div class="aa-properties-info ">'+
                      "<span><i class='fa fa-building'></i>&nbsp;"+ ((sortItem.floors != null)?
                          sortItem.floors +""
                     :"")+
                     "</span>"+
                     "<span><i class='fa fa-bed'></i>&nbsp;"+
                      ((sortItem.bedrooms != null)?
                          sortItem.bedrooms+sortItem.living_rooms +""
                     :"")+
                     "</span>"+
                     "<span><i class='fa fa-utensils'></i>&nbsp;"+
                      ((sortItem.kitchens != null)?
                          sortItem.kitchens +""
                     :"")+
                     "</span>"+
                     "<span><i class='fa fa-bath'></i>&nbsp;"+
                      ((sortItem.bathrooms != null)?
                          sortItem.bathrooms +""
                     :"")+
                     "</span>"+                   
                       "</div>"+
                       "<div class='aa-properties-about'>"+
                          "<div style=' display: flex;"+
                          "justify-content: space-between;"+
                          "align-items: flex-start;'>"+
                          ((sortItem.land_area != null)?
                          "<div><i class='fas fa-map'></i> Area:"+ sortItem.land_area +" </div>":"")+

                         " <span class='badge'>"+ sortItem.code+"</span>"+
                          "</div>"+
                          "<div class='price-detail'>"+
                              "<span class='aa-price'>"+
                              "Rs."+ price +""+
                                 ( (sortItem.negotiable_status=='yes')?"<span>(Negotiable)</span>":"")+
                                 " </span>"+
                                 "</div>"+
                                 "</div>"+
                       "</div>"+
                  "</article>"+
                "</div>");
                });
            },
        });
    }
});
