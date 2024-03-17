window.addEventListener('beforeunload', function () {
    document.getElementById("loading").style.display = "flex";
  });
  
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("loading").style.display = "none";
  });