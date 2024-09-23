const alert = {
  newWebSite: function (){
    if (confirm('Voulez-vous visiter mon nouveau portfolio ?')) {
      window.location.href = 'https://denovann.fr/';
    } else {
      console.log('Redirection annulée.');
    }
  }
}

export default alert;