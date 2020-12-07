// function to get the links by user 
function getLink(){ 
$.get("./inc/data.inc.php?id="+user, function (data) {   
    for(let i = data.length-1; i > data.length-5; i--){        
    $('.urls').append(render(data[i].url,data[i].slug));  
   }    
});    

   function render(link,slug) {  
      return `<a href="./?id=${slug.toLowerCase()}" target="blank"><li class='z-depth-1 hoverable'>${link}<i class="fa fa-link right fa-1x"></i></li></a>`;          
    }   
}      
// call the get method when document load 
getLink();