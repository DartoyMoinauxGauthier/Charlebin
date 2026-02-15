describe('Test Final Charlebin', () => {
    const urlLocale = 'http://localhost:8080'; 
    const monMessage = 'Test final pour mon BUT';
    const monMdp = 'gauthier2026';

    it('devrait fonctionner avec les sélecteurs réels du projet', () => {
        // 1. Connexion
        cy.visit(urlLocale);

        // 2. Création : On cible l'input dans le div #password
        cy.get('#message').should('exist').type(monMessage, { force: true });
        cy.get('#password input').first().type(monMdp, { force: true });
        cy.get('#sendbutton').click();

        // 3. Récupération de l'URL
        cy.url().should('include', '?').then((urlDuPaste) => {
            cy.log('URL générée:', urlDuPaste);
            
            // 4. Visite de l'URL - Le message devrait être déchiffré automatiquement
            // car la clé est dans le fragment (#) de l'URL
            cy.visit(urlDuPaste);

            // 5. Vérification du message déchiffré dans #prettyprint
            cy.get('#prettyprint', { timeout: 15000 })
                .should('exist')
                .should('be.visible')
                .and('contain', monMessage);
            
            cy.log(' Test réussi');
        });
    });
});