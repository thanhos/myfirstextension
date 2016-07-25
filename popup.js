document.addEventListener('DOMContentLoaded', function() {

  // Adding click event to button
  var checkPageButton = document.getElementById('but_click');
  checkPageButton.addEventListener('click', function() {

    chrome.tabs.getSelected(null, function(tab) {
      d = document;

      var f = d.createElement('form');
      f.action = 'http://demo.makitweb.com/cextension/cextension.php';
      f.method = 'post';
      var i = d.createElement('input');
      i.type = 'hidden';
      i.name = 'url';
      i.value = tab.url;
      f.appendChild(i);
      d.body.appendChild(f);
      f.submit();
      
    });

  }, false);
}, false);
