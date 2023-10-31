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
    $("#map").on("click", function(){toggleMapLink()})


});


const selectableTextArea = document.querySelectorAll(".selectable-text-area");
const linkedinShareBtn = document.querySelector("#linkedin-share-btn");
const facebookShareBtn = document.querySelector("#facebook-share-btn");
const twitterShareBtn = document.querySelector("#twitter-share-btn");
const ShareBtns = document.querySelector("#share-btns");

selectableTextArea.forEach(elem => {
  elem.addEventListener("mouseup", selectableTextAreaMouseUp);
});

//linkedinShareBtn.addEventListener("click", linkedinShareBtnClick);
//facebookShareBtn.addEventListener("click", facebookShareBtnClick);
twitterShareBtn.addEventListener("click", twitterShareBtnClick);


document.addEventListener("mousedown", documentMouseDown);

function selectableTextAreaMouseUp(event) {
  setTimeout(() => { // In order to avoid some weird behavior...
    const selectedText = window.getSelection().toString().trim();
    if(selectedText.length) { 
      const x = event.pageX;
      const y = event.pageY;
      const twitterShareBtnWidth = Number(getComputedStyle(twitterShareBtn).width.slice(0,-2));
      const twitterShareBtnHeight = Number(getComputedStyle(twitterShareBtn).height.slice(0,-2));
     
      if(document.activeElement !== twitterShareBtn) {
        twitterShareBtn.style.left = `${x - twitterShareBtnWidth*0.5}px`;
        twitterShareBtn.style.top = `${y - twitterShareBtnHeight*1.25}px`;
        twitterShareBtn.style.display = "block";
        twitterShareBtn.classList.add("btnEntrance");
      }
      else {
        twitterShareBtn.style.left = `${x-twitterShareBtnWidth*0.5}px`;
        twitterShareBtn.style.top = `${y-twitterShareBtnHeight*0.5}px`;
      }

      /*const ShareBtnsWidth = Number(getComputedStyle(ShareBtns).width.slice(0,-2));
      const ShareBtnsHeight = Number(getComputedStyle(ShareBtns).height.slice(0,-2));

      if(document.activeElement !== ShareBtns) {
        ShareBtns.style.left = `${x - ShareBtnsWidth*0.5}px`;
        ShareBtns.style.top = `${y - ShareBtnsHeight*1.25}px`;
        ShareBtns.style.display = "block";
        linkedinShareBtn.classList.add("btnEntrance");
        facebookShareBtn.classList.add("btnEntrance");
        twitterShareBtn.classList.add("btnEntrance");
      }
      else {
        ShareBtns.style.left = `${x-ShareBtnsWidth*0.5}px`;
        ShareBtns.style.top = `${y-ShareBtnsHeight*0.5}px`;
      }*/
    }    
  }, 0);
}

function documentMouseDown(event) {
  if(event.target.id!=="twitter-share-btn" && getComputedStyle(twitterShareBtn).display==="block") {
    twitterShareBtn.style.display = "none";
    twitterShareBtn.classList.remove("btnEntrance");
    window.getSelection().empty();
  }
  /*if(event.target.id!=="share-btns" && getComputedStyle(ShareBtns).display==="block") {
    ShareBtns.style.display = "none";
    linkedinShareBtn.classList.remove("btnEntrance");
    facebookShareBtn.classList.remove("btnEntrance");
    twitterShareBtn.classList.remove("btnEntrance");
    window.getSelection().empty();
  }*/
}

function twitterShareBtnClick(event) {
  const selectedText = window.getSelection().toString().trim();
  if(selectedText.length) {
    // General Twitter Share URL: https://twitter.com/intent/tweet?text={title}&url={url}&hashtags={hash_tags}&via={user_id}
    const twitterShareUrl = "https://twitter.com/intent/tweet";
    const text = `${encodeURIComponent(selectedText)}`;
    const currentUrl = encodeURIComponent(window.location.href);
    const hashtags = "helloworld, test, testing";
    const via = "CodingJrney";
    window.open(`${twitterShareUrl}?text="${text}"&url=${currentUrl}&hashtags=${hashtags}&via=${via}`);
    
    // Alternatively, we could include everything in the "text" field -> more room to customize the tweet:
    // window.open(`${twitterShareUrl}?text="${text}" by @${via} ${hashtags.split(",").map(h => "%23"+h.trim()).join(" ")} ${currentUrl}`);
    
    // We could also specify new window features:
    // const newWindowOptions = "height=400,width=550,top=0,left=0,resizable=yes,scrollbars=yes";
    // window.open(`${twitterShareUrl}?text="${text}"&url=${currentUrl}&hashtags=${hashtags}&via=${via}`, "ShareOnTwitter", newWindowOptions);
  }
}
function linkedinShareBtnClick(event) {
  const selectedText = window.getSelection().toString().trim();
  if(selectedText.length) {
    // General Twitter Share URL: https://twitter.com/intent/tweet?text={title}&url={url}&hashtags={hash_tags}&via={user_id}
    const twitterShareUrl = "https://twitter.com/intent/tweet";
    const text = `${encodeURIComponent(selectedText)}`;
    const currentUrl = encodeURIComponent(window.location.href);
    const hashtags = "helloworld, test, testing";
    const via = "CodingJrney";
    window.open(`${twitterShareUrl}?text="${text}"&url=${currentUrl}&hashtags=${hashtags}&via=${via}`);
    
    // Alternatively, we could include everything in the "text" field -> more room to customize the tweet:
    // window.open(`${twitterShareUrl}?text="${text}" by @${via} ${hashtags.split(",").map(h => "%23"+h.trim()).join(" ")} ${currentUrl}`);
    
    // We could also specify new window features:
    // const newWindowOptions = "height=400,width=550,top=0,left=0,resizable=yes,scrollbars=yes";
    // window.open(`${twitterShareUrl}?text="${text}"&url=${currentUrl}&hashtags=${hashtags}&via=${via}`, "ShareOnTwitter", newWindowOptions);
  }
}
function facebookShareBtnClick(event) {
  const selectedText = window.getSelection().toString().trim();
  if(selectedText.length) {
    // General Twitter Share URL: https://twitter.com/intent/tweet?text={title}&url={url}&hashtags={hash_tags}&via={user_id}
    const twitterShareUrl = "https://twitter.com/intent/tweet";
    const text = `${encodeURIComponent(selectedText)}`;
    const currentUrl = encodeURIComponent(window.location.href);
    const hashtags = "helloworld, test, testing";
    const via = "CodingJrney";
    window.open(`${twitterShareUrl}?text="${text}"&url=${currentUrl}&hashtags=${hashtags}&via=${via}`);
    
    // Alternatively, we could include everything in the "text" field -> more room to customize the tweet:
    // window.open(`${twitterShareUrl}?text="${text}" by @${via} ${hashtags.split(",").map(h => "%23"+h.trim()).join(" ")} ${currentUrl}`);
    
    // We could also specify new window features:
    // const newWindowOptions = "height=400,width=550,top=0,left=0,resizable=yes,scrollbars=yes";
    // window.open(`${twitterShareUrl}?text="${text}"&url=${currentUrl}&hashtags=${hashtags}&via=${via}`, "ShareOnTwitter", newWindowOptions);
  }
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