// Récupérer les références du formulaire et des champs de saisie
const form = document.getElementById('myForm');
const nomField = document.getElementById('nom');
const prixFIeld = document.getElementById('prix');
const idCategorieField = document.getElementById('IDcategorie');

// Ajouter un écouteur d'événements pour la soumission du formulaire
form.addEventListener('submit', (event) => {
  // Empêcher l'envoi du formulaire
  event.preventDefault();

  // Valider les champs de saisie
  if (!validateString(nomField.value)) {
    alert('Veuillez saisir un nom valide.');
    return;
  }
  
  if (!validateNumber(prixFIeld.value)) {
    alert('Veuillez saisir un prix valide.');
    return;
  }
  
  if (!validateNumber(idCategorieField.value)) {
    alert('Veuillez saisir un identifiant de catégorie valide.');
    return;
  }

  // Soumettre le formulaire si toutes les saisies sont valides
  form.submit();
});

// Fonction de validation pour les chaînes de caractères
function validateString(str) {
  // Vérifier si la chaîne est vide ou ne contient que des espaces
  if (!str.trim()) {
    return false;
  }
  
  // Autres validations selon vos besoins
  // Par exemple, vérifier si la chaîne ne contient que des lettres ou des caractères spécifiques
  
  return true;
}

// Fonction de validation pour les nombres
function validateNumber(num) {
  // Convertir la chaîne en nombre et vérifier si elle est valide
  if (isNaN(Number(num))) {
    return false;
  }
  
  // Autres validations selon vos besoins
  // Par exemple, vérifier si le nombre est supérieur à zéro
  
  return true;
}