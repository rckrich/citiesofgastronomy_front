//require('./bootstrap');
$(document).ready(function () {
    
    //sets navbar collapse button behavior
    var menuToggle = document.getElementById('navbarNav')
    var bsCollapse = new bootstrap.Collapse(menuToggle, {toggle:false})
    $("#OpenMenu").on("click", function(){bsCollapse.toggle()})
    $(".nav-link").on("click", function(){
        $(".nav-link.active").removeClass("active");
        $(".nav-item.active").removeClass("active");
        $(this).addClass("active");
        $(this).parent().addClass("active");
        bsCollapse.hide()
    });
    $('.modal').on('hide.bs.modal', function () {
      $('body').removeClass('modal-open');
      $('body').attr('style', 'overflow:auto');
      $('body').removeAttr('data-bs-overflow');
    });  
    $("#map").on("click", function(){toggleMapLink()})
    $(".filter-select").on("change", function(){
      $(this).addClass("changed");
      showResetFilterButton($(this))
    });
    $("#search_box").keypress(function (e) {
      var key = e.which;
      if(key == 13)  // the enter key code
       {
        $("#searchForm").submit();
      }
     }); 
     
     $("#editMailModalBtn").on("click", function(){openEditMailModal()})
});



function closeModal(modalId){
  $('#'+modalId).hide();
  $('body').removeClass('modal-open');
  $('body').attr('style', 'overflow:auto');
  $('body').removeAttr('data-bs-overflow');
}


function openMapModal(){
  var w = window.innerWidth;
  if(w>992){
    $('#map-card').removeClass('d-none');
    $('#map-card').addClass('d-block');
  }

}

function closeMapModal(){
  $('#map-card').addClass('d-none');
  $('#map-card').removeClass('d-block');
}

function toggleMapLink(){
  var w = window.innerWidth;
  if(w<=991){
    window.location.pathname = "/cities";
  }

}

function showResetFilterButton(){
  $("#clear-filters-btn").removeClass("d-none")
  $("#clear-filters-btn").addClass("d-flex")
}
function resetFilters(){
  $(".filter-select").prop('selectedIndex',0)
  this.hideResetFilterButton()
}
function hideResetFilterButton(){
  $("#clear-filters-btn").removeClass("d-flex")
  $("#clear-filters-btn").addClass("d-none")
}

function openEditMailModal(){
  //function
}

function formatNumber(number) {
  var str = number.toString();
  var chunks = [];
  for (var i = str.length - 1; i >= 0; i -= 3) {
      chunks.unshift(str.substring(Math.max(0, i - 2), i + 1));
  }
  return chunks.join(',');
}
