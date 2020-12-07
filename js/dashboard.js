// function to get the links by user 
function getLink() {
  $.get("./inc/data.inc.php?id="+user, function (data) {
    $('.g2 .links_num').text(data.length);
    let visits = []; 
      $('.urls').html('');     
    data.forEach(function (link) {
      visits.push(parseInt(link.visit));
        

      $('.urls').append(render(link.url, link.slug));
      
      $('.cover').click(({
        target
      }) => {
        const trash = target.closest('.trash')
        const edit = target.closest('.edit');
     if (edit){ 
        // proccess of getting the link
        const link_get_a = edit.parentNode.parentElement.previousElementSibling; 
        const link_get_b = link_get_a.querySelector('h5');
        const link = link_get_b.textContent;


          add('flex','_edit',{url: link,slug: edit.id});  
        } 
        function _trash(id) {
          getLink(); 
          $.get('./inc/delete.inc.php?slug='+id+'&id='+user,function (data) {  
          $('.notify').css('display', 'block');
          $('.notify .msg').text(data.msg); 
          setTimeout(function () {
            $('.notify').css('display', 'none');
          }, 3000)
        }); 
      }
      if (trash){
        _trash(trash.id); 
      }
      });
    });

    let sum = visits.reduce((a, b) => {
      return a + b
    })
    $('.g3 .links_num').text(sum);
  });

  function render(link, slug) {
    return `
        <div class="cover z-depth-1 hoverable center">
            <a href="./?id=${slug}" target="blank"> 
            <h5>${link}<i class="fa fa-link icon_link" style=""></i></h5>
             </a>
            <div class="right list ">
              <ul class="right center">
               <i id="${slug}" class="fa fa-pencil edit fa-2x"></i>
               <i id="${slug}" class="fa fa-trash trash fa-2x"></i> 
              </ul>
            </div> 
          </div>
      `;
  }
}
// call the get method when document load 
getLink();

// to display the add page
function add(display, type, info) {
  $('.add').html(`<i class="fa fa-remove remove fa-2x" onclick="add('none')"></i> `);  
  $('.add').css('display', display);
  switch (display) {
    case 'none':
        $('body').css('overflow', '')
      break; 
    default: 
    $('body').css('overflow','hidden') 
      break;
  }
  function _type(t) {
  if (t == '_add'){ 
      return `
           <form action="" class="input-field form form-add" method="POST"> 
          <input type="url" id="url" placeholder="enter long url">
          <input type="text" id="slug" placeholder="enter slug 🐌"> 
          <input type="submit" value="shrink" class="btn blue">
         </form>`;       
      }
      else if (t == '_edit'){
        return ` 
          <form action="" class="input-field form form-edit" method="POST"> 
          <input type="text" id="slug" value="${info.slug}" style="display:none" readonly>          
          <input type="url" id="url" value="${info.url}" placeholder="edit url" readonly>
          <input type="text" id="edit" value="${info.slug}" placeholder="edit slug 🐌"> 
          <input type="submit" value="edit" class="btn pink">
         </form>`;  
  }
   else if (t == '_url'){ 
        getLink();
        return `
              <div class="urls"></div>  `    
          }
   }


  $('.add').append(_type(type)); 
  $('.add .form-add').submit(function(){ 
    $.post('./inc/data.inc.php', {
      url: $('#url').val(),
      slug: $('#slug').val(),
      id: user
    });
    $('.add #slug').val(''); 
    $('.add #url').val(''); 
    getLink();
    return false; 
})

$('.add .form-edit').submit(function(){ 
    $.post('./inc/edit.inc.php', {
      url: $('#url').val(),
      slug: $('#slug').val(),
      edit: $('#edit').val(),
      id: user 
    });
    $('.add #slug').val(''); 
    $('.add #url').val(''); 
    getLink();     
    return false;
})
} 

// show notifications
function notify(display, msg) {
  $('.notify').css('display', display);
  $('.notify .msg').text(msg);
}


