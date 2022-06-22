/*Function pour transformer un tableau js au format formData envoyer en post*/
function arrayToFormData(form_data, array) {
    for (var key in array) {
      form_data.append(key, array[key]);
      // console.log(array[key])
    }
  
  
  }
  
  
  // Fonction pour sauvegarder un tableau dans le localStorageJS
  function addLocalStorage(idCmd,array) {
    let arrayName='facture_n_'+idCmd;
    if (localStorage.getItem(idCmd)==null){
      localStorage.setItem(arrayName, JSON.stringify(array)); 
      }
      else{
        alert("existe deja");
    }
    
  }
  

  //Fonction pour recuperer un tableau dans le localStorageJS
function getLocalStorage(arrayName){
    var array = localStorage.getItem(arrayName);
    // On parse le tableau en format Json
    array = JSON.parse(array);
    return array;
  }
  