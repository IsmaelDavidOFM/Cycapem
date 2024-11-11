@extends('/template/layout')
<style>
    .chart-container {
        width: 50%;
        margin: auto;
    }

    .chart {
        max-width: 100%;
    }
</style>
@section('titulo', 'panel')
@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
    <div class="container">
        <div class="header">
            <h1>Panel de Administración</h1>
            <p>Vista general de la actividad del sistema</p>
        </div>

        <div class="card-container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Número de Usuarios</h5>
                    <p class="card-text">{{ $totalUsuarios }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total de Clientes</h5>
                    <p class="card-text">{{ $totalClientes }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Consultas solicitadas</h5>
                    <p class="card-text">{{ $totalOrdenes }}</p>
                </div>
            </div>
        </div>


        <div class="chart-container">
            <canvas id="usersChart" class="chart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="customersChart" class="chart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="ordersChart" class="chart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            async function fetchChartData(url) {
                const response = await fetch(url);
                const data = await response.json();
                return data;
            }

            async function createCharts() {
                const usersData = await fetchChartData('/api/users-data');
                const customersData = await fetchChartData('/api/customers-data');
                const ordersData = await fetchChartData('/api/orders-data');

                const ctxUsers = document.getElementById('usersChart').getContext('2d');
                const ctxCustomers = document.getElementById('customersChart').getContext('2d');
                const ctxOrders = document.getElementById('ordersChart').getContext('2d');

                new Chart(ctxUsers, {
                    type: 'line',
                    data: {
                        labels: usersData.labels,
                        datasets: [{
                            label: 'Usuarios Registrados',
                            data: usersData.data,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                new Chart(ctxCustomers, {
                    type: 'line',
                    data: {
                        labels: customersData.labels,
                        datasets: [{
                            label: 'Clientes Registrados',
                            data: customersData.data,
                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                            borderColor: 'rgba(153, 102, 255, 1)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                new Chart(ctxOrders, {
                    type: 'line',
                    data: {
                        labels: ordersData.labels,
                        datasets: [{
                            label: 'Órdenes Realizadas',
                            data: ordersData.data,
                            backgroundColor: 'rgba(255, 159, 64, 0.2)',
                            borderColor: 'rgba(255, 159, 64, 1)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            createCharts();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endsection
