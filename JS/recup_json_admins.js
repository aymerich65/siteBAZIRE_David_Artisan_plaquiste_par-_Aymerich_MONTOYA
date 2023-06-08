const afficherAdminBtn = document.getElementById('afficher-admin');
const adminContainer = document.getElementById('admin-container');

afficherAdminBtn.addEventListener('click', function() {
    
    fetch('Modeles/recuperation_admins.php')
        .then(response => response.json())
        .then(data => {
            let adminHtml = '';
            data.forEach(admin => {
                adminHtml += `
                    <div class="tableauadminconsultationbdd">
                        <p>ID : ${admin.id}</p>
                    </div>
                `;
            });
            adminContainer.innerHTML = adminHtml;
            adminContainer.style.display = 'block'; 
        })
        .catch(error => {
            console.error('Une erreur s\'est produite :', error);
        });
});
