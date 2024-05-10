
// Écouteur d'événement pour exécuter du code lorsque le contenu du DOM est chargé
document.addEventListener('DOMContentLoaded', function() {
    // Sélectionner le formulaire de recherche et le conteneur des résultats
    const form = document.querySelector('#search-form');
    const resultsContainer = document.querySelector('#search-results');

    // Ajouter un écouteur d'événement de soumission au formulaire de recherche
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Empêcher le comportement de soumission par défaut du formulaire
        const query = document.querySelector('#search-input').value; // Obtenir la requête de recherche

        // Envoyer une requête AJAX vers le script côté serveur qui gère la recherche
        fetch('recherche.php?query=' + encodeURIComponent(query))
            .then(response => response.json()) // Analyser la réponse JSON
            .then(data => {
                // Effacer les résultats de recherche précédents
                resultsContainer.innerHTML = '';

                // Afficher les nouveaux résultats de recherche
                data.forEach(result => {
                    const resultItem = document.createElement('div');
                    resultItem.classList.add('result-item');

                    const title = document.createElement('h1');
                    title.textContent = result.title;

                    const description = document.createElement('p');
                    description.textContent = result.description;

                    resultItem.appendChild(title);
                    resultItem.appendChild(description);
                    
                    resultsContainer.appendChild(resultItem); // Ajouter l'élément de résultat au conteneur des résultats
                });
            })
            .catch(error => console.error('Error during search:', error)); // Gérer les erreurs
    });
});
