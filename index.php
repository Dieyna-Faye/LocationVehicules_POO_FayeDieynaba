
<!-- <?php require_once __DIR__ . '/../layout/header.php'; ?> -->

<style>
    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .stat-card-modern {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card-modern::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: var(--orange-primary);
        opacity: 0.05;
        border-radius: 50%;
        transform: translate(30%, -30%);
    }
    
    .stat-card-modern:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(255, 107, 53, 0.2);
    }
    
    .stat-icon-box {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }
    
    .stat-icon-box.orange {
        background: linear-gradient(135deg, #ff6b35 0%, #e55a2b 100%);
        color: white;
    }
    
    .stat-icon-box.green {
        background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
        color: white;
    }
    
    .stat-icon-box.blue {
        background: linear-gradient(135deg, #17a2b8 0%, #117a8b 100%);
        color: white;
    }
    
    .stat-icon-box.yellow {
        background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
        color: #1a1a1a;
    }
    
    .stat-value {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        color: #666;
        font-size: 0.95rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .stat-change {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-top: 0.5rem;
    }
    
    .stat-change.positive {
        background: #d4edda;
        color: #155724;
    }
    
    .stat-change.negative {
        background: #f8d7da;
        color: #721c24;
    }
    
    /* Chart Cards */
    .chart-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        height: 100%;
    }
    
    .chart-header {
        display: flex;
        justify-content: between;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    
    .chart-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1a1a1a;
    }
    
    .chart-filter {
        display: flex;
        gap: 0.5rem;
    }
    
    .filter-btn {
        padding: 0.4rem 1rem;
        border: 2px solid #e0e0e0;
        background: white;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
    }
    
    .filter-btn.active {
        background: #ff6b35;
        color: white;
        border-color: #ff6b35;
    }
    
    /* Recent Activity */
    .activity-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        border-radius: 12px;
        transition: 0.3s;
        margin-bottom: 0.5rem;
    }
    
    .activity-item:hover {
        background: #f8f9fa;
    }
    
    .activity-icon {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
    }
    
    .activity-icon.success {
        background: #d4edda;
        color: #28a745;
    }
    
    .activity-icon.warning {
        background: #fff3cd;
        color: #ffc107;
    }
    
    .activity-icon.info {
        background: #d1ecf1;
        color: #17a2b8;
    }
    
    .activity-content {
        flex: 1;
    }
    
    .activity-title {
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 0.2rem;
    }
    
    .activity-time {
        font-size: 0.85rem;
        color: #999;
    }
    
    /* Quick Actions */
    .quick-action-btn {
        background: white;
        border: 2px solid #e0e0e0;
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        transition: 0.3s;
        cursor: pointer;
        text-decoration: none;
        color: #1a1a1a;
        display: block;
    }
    
    .quick-action-btn:hover {
        border-color: #ff6b35;
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(255, 107, 53, 0.2);
        color: #1a1a1a;
    }
    
    .quick-action-icon {
        font-size: 2.5rem;
        margin-bottom: 0.8rem;
        color: #ff6b35;
    }
    
    .quick-action-label {
        font-weight: 600;
        font-size: 0.95rem;
    }
    
    /* Progress Bars */
    .progress-custom {
        height: 12px;
        border-radius: 10px;
        background: #f0f0f0;
        overflow: hidden;
    }
    
    .progress-bar-custom {
        height: 100%;
        border-radius: 10px;
        transition: width 1s ease;
    }
    
    .progress-bar-custom.orange {
        background: linear-gradient(90deg, #ff6b35 0%, #ff8c61 100%);
    }
    
    .progress-bar-custom.green {
        background: linear-gradient(90deg, #28a745 0%, #34ce57 100%);
    }
    
    /* Vehicle Status */
    .vehicle-status-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .vehicle-status-item:last-child {
        border-bottom: none;
    }
    
    .vehicle-type {
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }
    
    .vehicle-type-icon {
        font-size: 1.5rem;
    }
    
    .vehicle-type-info h5 {
        margin: 0;
        font-size: 1rem;
        font-weight: 600;
        color: #1a1a1a;
    }
    
    .vehicle-type-info span {
        font-size: 0.85rem;
        color: #999;
    }
    
    .vehicle-count {
        font-size: 1.5rem;
        font-weight: 700;
        color: #ff6b35;
    }
</style>

<div class="container-fluid px-4">
    
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h1 class="mb-2">
                        <i class="bi bi-speedometer2 text-primary"></i> 
                        Dashboard
                    </h1>
                    <p class="text-muted mb-0">
                        <i class="bi bi-calendar3"></i> 
                        <?= date('l, d F Y') ?> • 
                        <span class="text-success">
                            <i class="bi bi-circle-fill" style="font-size: 0.5rem;"></i>
                            Système opérationnel
                        </span>
                    </p>
                </div>
                <div>
                    <a href="index.php?page=locations&action=create" class="btn btn-primary btn-lg">
                        <i class="bi bi-plus-circle"></i> Nouvelle Location
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Stats Grid -->
    <div class="stats-grid">
        <!-- Total Véhicules -->
        <div class="stat-card-modern">
            <div class="stat-icon-box orange">
                <i class="bi bi-car-front-fill"></i>
            </div>
            <div class="stat-value"><?= $stats['total_vehicules'] ?></div>
            <div class="stat-label">Total Véhicules</div>
            <div class="stat-change positive">
                <i class="bi bi-arrow-up"></i> +5 ce mois
            </div>
        </div>
        
        <!-- Véhicules Disponibles -->
        <div class="stat-card-modern">
            <div class="stat-icon-box green">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="stat-value"><?= $stats['vehicules_disponibles'] ?></div>
            <div class="stat-label">Disponibles</div>
            <div class="stat-change positive">
                <i class="bi bi-arrow-up"></i> 
                <?= round(($stats['vehicules_disponibles'] / $stats['total_vehicules']) * 100) ?>%
            </div>
        </div>
        
        <!-- Locations Actives -->
        <div class="stat-card-modern">
            <div class="stat-icon-box yellow">
                <i class="bi bi-calendar-check-fill"></i>
            </div>
            <div class="stat-value"><?= $stats['locations_actives'] ?></div>
            <div class="stat-label">Locations Actives</div>
            <div class="stat-change positive">
                <i class="bi bi-arrow-up"></i> +3 aujourd'hui
            </div>
        </div>
        
        <!-- Revenus du Mois -->
        <div class="stat-card-modern">
            <div class="stat-icon-box blue">
                <i class="bi bi-currency-euro"></i>
            </div>
            <div class="stat-value"><?= number_format($stats['revenus_mois'], 0) ?>€</div>
            <div class="stat-label">Revenus du Mois</div>
            <div class="stat-change positive">
                <i class="bi bi-arrow-up"></i> +12% vs mois dernier
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="chart-card">
                <h5 class="chart-title mb-3">
                    <i class="bi bi-lightning-charge-fill text-primary"></i>
                    Actions Rapides
                </h5>
                <div class="row g-3">
                    <div class="col-md-3 col-6">
                        <a href="index.php?page=vehicules&action=create" class="quick-action-btn">
                            <div class="quick-action-icon">
                                <i class="bi bi-plus-circle"></i>
                            </div>
                            <div class="quick-action-label">Ajouter Véhicule</div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="index.php?page=clients&action=create" class="quick-action-btn">
                            <div class="quick-action-icon">
                                <i class="bi bi-person-plus"></i>
                            </div>
                            <div class="quick-action-label">Nouveau Client</div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="index.php?page=locations&action=create" class="quick-action-btn">
                            <div class="quick-action-icon">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <div class="quick-action-label">Nouvelle Location</div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="index.php?page=locations&action=historique" class="quick-action-btn">
                            <div class="quick-action-icon">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div class="quick-action-label">Historique</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Locations En Cours -->
        <div class="col-lg-8 mb-4">
            <div class="chart-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="chart-title mb-0">
                        <i class="bi bi-hourglass-split text-warning"></i>
                        Locations En Cours
                    </h5>
                    <a href="index.php?page=locations" class="btn btn-sm btn-outline-primary">
                        Voir tout <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                
                <?php if (empty($locationsActives)): ?>
                    <div class="text-center py-5">
                        <i class="bi bi-inbox" style="font-size: 4rem; color: #ddd;"></i>
                        <p class="text-muted mt-3">Aucune location active pour le moment</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Véhicule</th>
                                    <th>Dates</th>
                                    <th>Prix</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (array_slice($locationsActives, 0, 5) as $location): 
                                    $client = $location->getClient($db);
                                    $vehicule = $location->getVehicule($db);
                                ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                                 style="width: 35px; height: 35px; font-weight: 600;">
                                                <?= strtoupper(substr($client->getPrenom(), 0, 1)) ?>
                                            </div>
                                            <strong><?= htmlspecialchars($client->getNomComplet()) ?></strong>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong><?= htmlspecialchars($vehicule->getMarque()) ?></strong>
                                            <small class="text-muted d-block"><?= htmlspecialchars($vehicule->getModele()) ?></small>
                                        </div>
                                    </td>
                                    <td>
                                        <small>
                                            <?= date('d/m', strtotime($location->getDateDebut())) ?> 
                                            → 
                                            <?= date('d/m', strtotime($location->getDateFin())) ?>
                                        </small>
                                    </td>
                                    <td>
                                        <strong class="text-primary"><?= number_format($location->getPrixTotal(), 2) ?>€</strong>
                                    </td>
                                    <td class="text-end">
                                        <a href="index.php?page=locations&action=terminer&id=<?= $location->getId() ?>" 
                                           class="btn btn-sm btn-success"
                                           onclick="return confirm('Confirmer le retour du véhicule ?')">
                                            <i class="bi bi-check-circle"></i> Terminer
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Statistiques Véhicules -->
        <div class="col-lg-4 mb-4">
            <div class="chart-card">
                <h5 class="chart-title mb-4">
                    <i class="bi bi-pie-chart-fill text-primary"></i>
                    Répartition Véhicules
                </h5>
                
                <?php
                // Compter les véhicules par type
                $sql = "SELECT type, COUNT(*) as count FROM vehicules GROUP BY type";
                $stmt = $db->query($sql);
                $typesCount = [];
                while ($row = $stmt->fetch()) {
                    $typesCount[$row['type']] = $row['count'];
                }
                $totalV = array_sum($typesCount);
                ?>
                
                <div class="vehicle-status-item">
                    <div class="vehicle-type">
                        <div class="vehicle-type-icon">🚗</div>
                        <div class="vehicle-type-info">
                            <h5>Voitures</h5>
                            <span><?= round(($typesCount['voiture'] ?? 0) / $totalV * 100) ?>% du total</span>
                        </div>
                    </div>
                    <div class="vehicle-count"><?= $typesCount['voiture'] ?? 0 ?></div>
                </div>
                
                <div class="progress-custom mb-3">
                    <div class="progress-bar-custom orange" 
                         style="width: <?= round(($typesCount['voiture'] ?? 0) / $totalV * 100) ?>%">
                    </div>
                </div>
                
                <div class="vehicle-status-item">
                    <div class="vehicle-type">
                        <div class="vehicle-type-icon">🏍️</div>
                        <div class="vehicle-type-info">
                            <h5>Motos</h5>
                            <span><?= round(($typesCount['moto'] ?? 0) / $totalV * 100) ?>% du total</span>
                        </div>
                    </div>
                    <div class="vehicle-count"><?= $typesCount['moto'] ?? 0 ?></div>
                </div>
                
                <div class="progress-custom mb-3">
                    <div class="progress-bar-custom green" 
                         style="width: <?= round(($typesCount['moto'] ?? 0) / $totalV * 100) ?>%">
                    </div>
                </div>
                
                <div class="vehicle-status-item">
                    <div class="vehicle-type">
                        <div class="vehicle-type-icon">🚚</div>
                        <div class="vehicle-type-info">
                            <h5>Camions</h5>
                            <span><?= round(($typesCount['camion'] ?? 0) / $totalV * 100) ?>% du total</span>
                        </div>
                    </div>
                    <div class="vehicle-count"><?= $typesCount['camion'] ?? 0 ?></div>
                </div>
                
                <div class="progress-custom mb-3">
                    <div class="progress-bar-custom" 
                         style="width: <?= round(($typesCount['camion'] ?? 0) / $totalV * 100) ?>%; background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Véhicules Disponibles & Activité Récente -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="chart-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="chart-title mb-0">
                        <i class="bi bi-car-front text-success"></i>
                        Véhicules Disponibles
                    </h5>
                    <a href="index.php?page=vehicules&disponible=1" class="btn btn-sm btn-outline-primary">
                        Voir tout
                    </a>
                </div>
                
                <?php if (empty($vehiculesDisponibles)): ?>
                    <p class="text-muted">Aucun véhicule disponible</p>
                <?php else: ?>
                    <div class="row g-3">
                        <?php foreach ($vehiculesDisponibles as $vehicule): ?>
                        <div class="col-md-6">
                            <div class="quick-action-btn" style="padding: 1rem;">
                                <div style="font-size: 2rem; margin-bottom: 0.5rem;">
                                    <?php
                                    $icons = ['voiture' => '🚗', 'moto' => '🏍️', 'camion' => '🚚'];
                                    echo $icons[$vehicule->getType()];
                                    ?>
                                </div>
                                <strong class="d-block"><?= htmlspecialchars($vehicule->getMarque()) ?></strong>
                                <small class="text-muted"><?= htmlspecialchars($vehicule->getModele()) ?></small>
                                <div class="mt-2">
                                    <span class="badge bg-primary"><?= $vehicule->getPrixJour() ?>€/j</span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="col-lg-6 mb-4">
            <div class="chart-card">
                <h5 class="chart-title mb-3">
                    <i class="bi bi-activity text-info"></i>
                    Activité Récente
                </h5>
                
                <div class="activity-item">
                    <div class="activity-icon success">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Nouvelle location créée</div>
                        <div class="activity-time">Il y a 2 heures</div>
                    </div>
                </div>
                
                <div class="activity-item">
                    <div class="activity-icon info">
                        <i class="bi bi-car-front"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Véhicule ajouté : Peugeot 208</div>
                        <div class="activity-time">Il y a 5 heures</div>
                    </div>
                </div>
                
                <div class="activity-item">
                    <div class="activity-icon warning">
                        <i class="bi bi-clock"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Location terminée</div>
                        <div class="activity-time">Hier à 14:30</div>
                    </div>
                </div>
                
                <div class="activity-item">
                    <div class="activity-icon success">
                        <i class="bi bi-person-plus"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Nouveau client : Fatou Ndiaye</div>
                        <div class="activity-time">Hier à 10:15</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
// Animation des stats au chargement
document.addEventListener('DOMContentLoaded', function() {
    // Animer les chiffres
    document.querySelectorAll('.stat-value').forEach(el => {
        const target = parseInt(el.textContent);
        let current = 0;
        const increment = target / 50;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                el.textContent = target;
                clearInterval(timer);
            } else {
                el.textContent = Math.floor(current);
            }
        }, 20);
    });
    
    // Animer les barres de progression
    setTimeout(() => {
        document.querySelectorAll('.progress-bar-custom').forEach(bar => {
            bar.style.width = bar.style.width;
        });
    }, 500);
});
</script>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>