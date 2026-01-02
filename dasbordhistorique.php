




<?php
require_once __DIR__ . '/Crud/Location_Crud.php';

    $crud = new Location_crud();
   
    $locations = $crud->getHistorique();

   require_once 'config/Autan.php';

    $auth = new Autan();
    $auth->check();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AutoLoc Pro</title>
    <link rel="stylesheet" href="historique.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Pacifico&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
</head>
<body>
    
    <div class="sidebar">
        <div class="logo">
            <img src="./html/page/image/ChatGPT Image 18 déc. 2025, 18_36_23 1.png" alt="">
        </div>
        
        <div class="menu">
            <a href="dasbordlocation.php" class="menu-item active">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 5C16 4.06812 16 3.60218 16.1522 3.23463C16.3552 2.74458 16.7446 2.35523 17.2346 2.15224C17.6022 2 18.0681 2 19 2C19.9319 2 20.3978 2 20.7654 2.15224C21.2554 2.35523 21.6448 2.74458 21.8478 3.23463C22 3.60218 22 4.06812 22 5V9C22 9.93188 22 10.3978 21.8478 10.7654C21.6448 11.2554 21.2554 11.6448 20.7654 11.8478C20.3978 12 19.9319 12 19 12C18.0681 12 17.6022 12 17.2346 11.8478C16.7446 11.6448 16.3552 11.2554 16.1522 10.7654C16 10.3978 16 9.93188 16 9V5Z" stroke="#E63F11" stroke-width="1.5"/>
                <path d="M16 19C16 18.0681 16 17.6022 16.1522 17.2346C16.3552 16.7446 16.7446 16.3552 17.2346 16.1522C17.6022 16 18.0681 16 19 16C19.9319 16 20.3978 16 20.7654 16.1522C21.2554 16.3552 21.6448 16.7446 21.8478 17.2346C22 17.6022 22 18.0681 22 19C22 19.9319 22 20.3978 21.8478 20.7654C21.6448 21.2554 21.2554 21.6448 20.7654 21.8478C20.3978 22 19.9319 22 19 22C18.0681 22 17.6022 22 17.2346 21.8478C16.7446 21.6448 16.3552 21.2554 16.1522 20.7654C16 20.3978 16 19.9319 16 19Z" stroke="#E63F11" stroke-width="1.5"/>
                <path d="M2 16C2 14.1144 2 13.1716 2.58579 12.5858C3.17157 12 4.11438 12 6 12H8C9.88562 12 10.8284 12 11.4142 12.5858C12 13.1716 12 14.1144 12 16V18C12 19.8856 12 20.8284 11.4142 21.4142C10.8284 22 9.88562 22 8 22H6C4.11438 22 3.17157 22 2.58579 21.4142C2 20.8284 2 19.8856 2 18V16Z" stroke="#E63F11" stroke-width="1.5"/>
                <path d="M2 5C2 4.06812 2 3.60218 2.15224 3.23463C2.35523 2.74458 2.74458 2.35523 3.23463 2.15224C3.60218 2 4.06812 2 5 2H9C9.93188 2 10.3978 2 10.7654 2.15224C11.2554 2.35523 11.6448 2.74458 11.8478 3.23463C12 3.60218 12 4.06812 12 5C12 5.93188 12 6.39782 11.8478 6.76537C11.6448 7.25542 11.2554 7.64477 10.7654 7.84776C10.3978 8 9.93188 8 9 8H5C4.06812 8 3.60218 8 3.23463 7.84776C2.74458 7.64477 2.35523 7.25542 2.15224 6.76537C2 6.39782 2 5.93188 2 5Z" stroke="#E63F11" stroke-width="1.5"/>
                </svg>

                <span>Dashboard</span>
            </a>
            <a href="dasbordvehicule.php" class="menu-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.5 12L4.5 13" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21.5 12.5L19.5 13" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8 17.5L8.24567 16.8858C8.61101 15.9725 8.79368 15.5158 9.17461 15.2579C9.55553 15 10.0474 15 11.0311 15H12.9689C13.9526 15 14.4445 15 14.8254 15.2579C15.2063 15.5158 15.389 15.9725 15.7543 16.8858L16 17.5" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2 17V19.882C2 20.2607 2.24075 20.607 2.62188 20.7764C2.86918 20.8863 3.10538 21 3.39058 21H5.10942C5.39462 21 5.63082 20.8863 5.87812 20.7764C6.25925 20.607 6.5 20.2607 6.5 19.882V18" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M17.5 18V19.882C17.5 20.2607 17.7408 20.607 18.1219 20.7764C18.3692 20.8863 18.6054 21 18.8906 21H20.6094C20.8946 21 21.1308 20.8863 21.3781 20.7764C21.7592 20.607 22 20.2607 22 19.882V17" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M20 8.5L21 8" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4 8.5L3 8" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4.5 9L5.5883 5.73509C6.02832 4.41505 6.24832 3.75503 6.7721 3.37752C7.29587 3 7.99159 3 9.38304 3H14.617C16.0084 3 16.7041 3 17.2279 3.37752C17.7517 3.75503 17.9717 4.41505 18.4117 5.73509L19.5 9" stroke="#E63F11" stroke-width="1.5" stroke-linejoin="round"/>
                <path d="M4.5 9H19.5C20.4572 10.0135 22 11.4249 22 12.9996V16.4702C22 17.0407 21.6205 17.5208 21.1168 17.5875L18 18H6L2.88316 17.5875C2.37955 17.5208 2 17.0407 2 16.4702V12.9996C2 11.4249 3.54279 10.0135 4.5 9Z" stroke="#E63F11" stroke-width="1.5" stroke-linejoin="round"/>
                </svg>

                
                <span>Véhicules</span>
            </a>
            <a href="dasbordclient.php" class="menu-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.6161 20H19.1063C20.2561 20 21.1707 19.4761 21.9919 18.7436C24.078 16.8826 19.1741 15 17.5 15M15.5 5.06877C15.7271 5.02373 15.9629 5 16.2048 5C18.0247 5 19.5 6.34315 19.5 8C19.5 9.65685 18.0247 11 16.2048 11C15.9629 11 15.7271 10.9763 15.5 10.9312" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M4.48131 16.1112C3.30234 16.743 0.211137 18.0331 2.09388 19.6474C3.01359 20.436 4.03791 21 5.32572 21H12.6743C13.9621 21 14.9864 20.436 15.9061 19.6474C17.7889 18.0331 14.6977 16.743 13.5187 16.1112C10.754 14.6296 7.24599 14.6296 4.48131 16.1112Z" stroke="#E63F11" stroke-width="1.5"/>
                <path d="M13 7.5C13 9.70914 11.2091 11.5 9 11.5C6.79086 11.5 5 9.70914 5 7.5C5 5.29086 6.79086 3.5 9 3.5C11.2091 3.5 13 5.29086 13 7.5Z" stroke="#E63F11" stroke-width="1.5"/>
                </svg>

                                
                <span>Clients</span>
            </a>
            <a href="dasbordloc.php" class="menu-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.5 16.9286V10C20.5 6.22876 20.5 4.34315 19.3284 3.17157C18.1569 2 16.2712 2 12.5 2H11.5C7.72876 2 5.84315 2 4.67157 3.17157C3.5 4.34315 3.5 6.22876 3.5 10V19.5" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M20.5 17H6C4.61929 17 3.5 18.1193 3.5 19.5C3.5 20.8807 4.61929 22 6 22H20.5" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M20.5 22C19.1193 22 18 20.8807 18 19.5C18 18.1193 19.1193 17 20.5 17" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M15 7L9 7" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 11L9 11" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                
                <span>Locations</span>
            </a>
             <a href="" class="menu-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10" stroke="#E63F11" stroke-width="1.5"/>
                <path d="M12 8V12L14 14" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <span>Historique</span>

            </a>
            
            <a href="logout.php" class="menu-dec">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 17.625C14.9264 19.4769 13.3831 21.0494 11.3156 20.9988C10.8346 20.987 10.2401 20.8194 9.05112 20.484C6.18961 19.6768 3.70555 18.3203 3.10956 15.2815C3 14.723 3 14.0944 3 12.8373L3 11.1627C3 9.90561 3 9.27705 3.10956 8.71846C3.70555 5.67965 6.18961 4.32316 9.05112 3.51603C10.2401 3.18064 10.8346 3.01295 11.3156 3.00119C13.3831 2.95061 14.9264 4.52307 15 6.37501" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M21 12H10M21 12C21 11.2998 19.0057 9.99153 18.5 9.5M21 12C21 12.7002 19.0057 14.0085 18.5 14.5" stroke="#E63F11" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                
                <span>Deconnexion</span>
            </a>
        </div>
    </div>
    

    
    <div class="main-content">
        <div class="div">
                <?php if(isset($_SESSION['message'])): ?>
                    <div style="padding: 16px 20px; border-radius: 12px; margin-bottom: 20px; background: <?= $_SESSION['message_type'] == 'success' ? '#d4edda' : '#f8d7da' ?>; color: <?= $_SESSION['message_type'] == 'success' ? '#155724' : '#721c24' ?>; border: 1px solid <?= $_SESSION['message_type'] == 'success' ? '#c3e6cb' : '#f5c6cb' ?>;">
                        <?= $_SESSION['message'] ?>
                    </div>
                    <?php unset($_SESSION['message']); unset($_SESSION['message_type']); ?>
                <?php endif; ?>

                <div class="header">
                    <div>
                        <h2>Dashboard</h2>
                        
                    </div>
                    <div class="user-info">
                        <div class="avatar">AD</div>
                        <div>
                            <div class="user-name">Administrateur</div>
                            <div class="user-role">Gestionnaire Principal</div>
                        </div>
                </div>
            </div>

        
        </div>
        <div class="bienvenu">
            <h2>Bienvenue, Mr Faye</h2>
        </div>

        
        <div class="content-grid">
            
            <div class="table-wrapper">
                <h2>Historique des locations</h2>

                    <table>
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Véhicule</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Prix total</th>
                                <th>Statut</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(!empty($locations)): ?>
                                <?php foreach($locations as $l): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($l['client_nom']) ?></td>
                                        <td><?= htmlspecialchars($l['vehicule_marque'].' '.$l['vehicule_modele']) ?></td>
                                        <td><?= $l['date_debut'] ?></td>
                                        <td><?= $l['date_fin'] ?></td>
                                        <td><?= number_format($l['prix_total'], 0, ',', ' ') ?> FCFA</td>
                                        <td>
                                           <?php
                                                if ($l['statut'] === 'terminer') {
                                                    $class = 'finished';
                                                    $label = 'Terminée';
                                                } else {
                                                    $class = 'pending';
                                                    $label = 'En cours';
                                                }
                                                ?>
                                                <span class="status <?= $class ?>"><?= $label ?></span>

                                                </span>

                                        </td>

                                       


                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">Aucune location terminée</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

            </div>


            <!-- ACTIONS RAPIDES -->
            
        </div>
    </div>

    <script>
    
        window.addEventListener('load', () => {
            const elements = document.querySelectorAll('.stat-card, .card, .location-item');
            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    el.style.transition = 'all 0.6s ease';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 60);
            });
        });

        
        setInterval(() => {
            location.reload();
        }, 30000);
    </script>
</body>
</html>