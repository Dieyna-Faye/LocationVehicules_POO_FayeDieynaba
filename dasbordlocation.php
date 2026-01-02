  <?php
    require_once __DIR__ . '/Crud/Vehicule_crud.php';
    require_once __DIR__ . '/Crud/Client_crud.php';
    require_once __DIR__ . '/Crud/Location_Crud.php';

    $vehiculeCrud = new Vehicule_crud();
    $clientCrud = new Client_crud();
    $locationCrud = new Location_crud();

    $totalVehicules = $vehiculeCrud->countVehicules();
    $totalClients = $clientCrud->countClients();
    $totalLocations = $locationCrud->countLocations();


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
    <link rel="stylesheet" href="dasbordlocation.css">
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
            <a href="dasbordhistorique.php" class="menu-item">
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
            <h2>Bienvenue <?= $_SESSION['admin_email'] ?></h2>
        </div>

       
        <div class="stats-grid">
            <div class="stat-card">
               <div class="stat">
                    <div class="stat-icon">
                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="25" cy="25" r="25" fill="#E63F11"/>
                        <path d="M15.5 25L17.5 26" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M34.5 25.5L32.5 26" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 30.5L21.2457 29.8858C21.611 28.9725 21.7937 28.5158 22.1746 28.2579C22.5555 28 23.0474 28 24.0311 28H25.9689C26.9526 28 27.4445 28 27.8254 28.2579C28.2063 28.5158 28.389 28.9725 28.7543 29.8858L29 30.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15 30V32.882C15 33.2607 15.2408 33.607 15.6219 33.7764C15.8692 33.8863 16.1054 34 16.3906 34H18.1094C18.3946 34 18.6308 33.8863 18.8781 33.7764C19.2592 33.607 19.5 33.2607 19.5 32.882V31" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M30.5 31V32.882C30.5 33.2607 30.7408 33.607 31.1219 33.7764C31.3692 33.8863 31.6054 34 31.8906 34H33.6094C33.8946 34 34.1308 33.8863 34.3781 33.7764C34.7592 33.607 35 33.2607 35 32.882V30" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M33 21.5L34 21" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17 21.5L16 21" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.5 22L18.5883 18.7351C19.0283 17.4151 19.2483 16.755 19.7721 16.3775C20.2959 16 20.9916 16 22.383 16H27.617C29.0084 16 29.7041 16 30.2279 16.3775C30.7517 16.755 30.9717 17.4151 31.4117 18.7351L32.5 22" stroke="white" stroke-width="1.5" stroke-linejoin="round"/>
                        <path d="M17.5 22H32.5C33.4572 23.0135 35 24.4249 35 25.9996V29.4702C35 30.0407 34.6205 30.5208 34.1168 30.5875L31 31H19L15.8832 30.5875C15.3795 30.5208 15 30.0407 15 29.4702V25.9996C15 24.4249 16.5428 23.0135 17.5 22Z" stroke="white" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="stat-label">
                        <p>Total Vehicule</p>
                         <p class="count"><?= $totalVehicules ?></p>
                       
                    </div>

                </div>
                

               
                <div class="stat-change">
                    <span>↗</span> <?= $stats['vehicules_disponibles'] ?? 0 ?> disponibles
                </div>
                 
            </div>
            <div class="stat-card">
               <div class="stat">
                    <div class="stat-icon">
                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="25" fill="#E63F11"/>
                            <path d="M33.5 29.9286V23C33.5 19.2288 33.5 17.3431 32.3284 16.1716C31.1569 15 29.2712 15 25.5 15H24.5C20.7288 15 18.8431 15 17.6716 16.1716C16.5 17.3431 16.5 19.2288 16.5 23V32.5" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M33.5 30H19C17.6193 30 16.5 31.1193 16.5 32.5C16.5 33.8807 17.6193 35 19 35H33.5" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M33.5 35C32.1193 35 31 33.8807 31 32.5C31 31.1193 32.1193 30 33.5 30" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M28 20L22 20" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M25 24L22 24" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                    </div>
                    <div class="stat-label">
                        <p>Locations en Cours</p>
                           <p class="count"><?= $totalLocations ?></p>
                       
                    </div>

                </div>
                

                <div class="stat-change">
                    <span>↗</span> Actives
                </div>
                 
            </div>
             <div class="stat-card">
               <div class="stat">
                    <div class="stat-icon">
                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="25" cy="25" r="25" fill="#E63F11"/>
                        <path d="M31.6161 30H32.1063C33.2561 30 34.1707 29.4761 34.9919 28.7436C37.078 26.8826 32.1741 25 30.5 25M28.5 15.0688C28.7271 15.0237 28.9629 15 29.2048 15C31.0247 15 32.5 16.3431 32.5 18C32.5 19.6569 31.0247 21 29.2048 21C28.9629 21 28.7271 20.9763 28.5 20.9312" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M17.4813 26.1112C16.3023 26.743 13.2111 28.0331 15.0939 29.6474C16.0136 30.436 17.0379 31 18.3257 31H25.6743C26.9621 31 27.9864 30.436 28.9061 29.6474C30.7889 28.0331 27.6977 26.743 26.5187 26.1112C23.754 24.6296 20.246 24.6296 17.4813 26.1112Z" stroke="white" stroke-width="1.5"/>
                        <path d="M26 17.5C26 19.7091 24.2091 21.5 22 21.5C19.7909 21.5 18 19.7091 18 17.5C18 15.2909 19.7909 13.5 22 13.5C24.2091 13.5 26 15.2909 26 17.5Z" stroke="white" stroke-width="1.5"/>
                        </svg>


                    </div>
                    <div class="stat-label">
                        <p>Clients</p>
                         <p class="count"><?= $totalClients ?></p>
                       
                    </div>

                </div>
                

                <div class="stat-change">
                    <span>↗</span> Enregistrés
                </div>
                 
            </div>

            


        </div>

    
        <div class="content-grid">
           
            <div class="card">
                <div class="card-title">
                    <span>📋</span>
                    Locations Récentes
                </div>
               
               <?php
               require_once __DIR__ . '/Crud/Location_Crud.php';

                $crud = new Location_Crud();
                $locations = $crud->getLast7();

               ?>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Véhicule</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Prix total</th>
                        <th>Actions</th>
                    </tr>
                    <?php if(!empty($locations)): ?>
                        <?php foreach($locations as $l): ?>
                        <tr>
                            <td data-label="ID"><?= $l['id'] ?></td>
                            <td data-label="Client"><?= htmlspecialchars($l['client_nom']) ?></td>
                            <td data-label="Véhicule"><?= htmlspecialchars($l['vehicule_marque'] . ' ' . $l['vehicule_modele']) ?></td>
                            <td data-label="Date début"><?= $l['date_debut'] ?></td>
                            <td data-label="Date fin"><?= $l['date_fin'] ?></td>
                            <td data-label="Prix total"><?= number_format($l['prix_total'], 2, ',', ' ') ?> €</td>
                            <td data-label="Actions" class="actions">
                                <a class="btn-edit" href="modifier_location.php?id=<?= $l['id'] ?>">Modifier</a>
                                <a class="btn-delete" href="supprimer_location.php?id=<?= $l['id'] ?>" onclick="return confirm('Supprimer cette location ?');">Supprimer</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" style="text-align:center; padding:20px;">Aucune location disponible.</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
           
            <div>
                <div class="card-lien" style="margin-bottom: 24px;">
                    <div class="card-title">
                        <span>⚡</span>
                        Actions Rapides
                    </div>
                    
                    <a href="location/ajout_location.php" class="quick-action">
                        
                        Nouvelle Location
                    </a>
                    <a href="vehicules/ajout_vehicule.php" class="quick-action secondary">
                        
                        Ajouter Véhicule
                    </a>
                    <a href="clients/ajout_client.php" class="quick-action secondary">
                       
                        Nouveau Client
                    </a>
                </div>

                
            </div>
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