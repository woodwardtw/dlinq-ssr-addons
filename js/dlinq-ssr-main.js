window.onload = function() {
  const currentUrl =  window.location.href.split('?')[0];;//replace with window.location.href in production
  var menuLinks = [];

  let menu = document.querySelector('.bellows-nav');
  let lis = menu.querySelectorAll('li');
  lis.forEach((li) => {
    let link = li.querySelector('a').href;
    menuLinks.push(link);
  });
  //console.log(menuLinks)

  let position = parseInt(menuLinks.indexOf(currentUrl));//gets current url array position
  //console.log(position)
  if(position-1 >=0){
    var previous = menuLinks[position-1];
  }
  if(position+1 <= menuLinks.length){
     var next = menuLinks[position+1];
  }

  if(document.querySelector('.next')){
    let nextButton = document.querySelector('.next');
    let nextButtonUrl =  nextButton.href;
    if (nextButtonUrl != next){
      nextButton.href = next;
    }
  }

  if(document.querySelector('.previous')){
    let prevButton = document.querySelector('.previous');
    let prevButtonUrl =  prevButton.href;
    if (prevButtonUrl != previous){
      prevButton.href = previous;
    }
  }
}