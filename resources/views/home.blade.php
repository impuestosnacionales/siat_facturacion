@extends('base')

@section('name')
    Gráficos
@endsection

@section('content')
    <div style="display: flex; justify-content: space-around;">
        <div style="width: 30%;">
            <canvas id="barChart"></canvas>
        </div>
        <div style="width: 30%;">
            <canvas id="pieChart"></canvas>
        </div>
        <div style="width: 30%;">
            <canvas id="lineChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
    <script>
        var bar_ctx = document.getElementById('barChart').getContext('2d');
        var pie_ctx = document.getElementById('pieChart').getContext('2d');
        var line_ctx = document.getElementById('lineChart').getContext('2d');

        var nombres_roles = @json($roles['nombresRoles']);
        var rol_counts = @json($roles['rolCounts']);
        var months = @json($usersByMonth['months']);
        var user_counts = @json($usersByMonth['userCounts']);
        var days = @json($usersByDay['days']);
        var user_counts_day = @json($usersByDay['userCounts']);

        // Verificar los datos en la consola
        console.log('Days:', days);
        console.log('User counts per day:', user_counts_day);

        // Gráfico de roles
        var barChart = new Chart(bar_ctx, {
            type: 'bar',
            data: {
                labels: nombres_roles,
                datasets: [{
                    label: 'Número de roles',
                    data: rol_counts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
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

        // Gráfico de usuarios por mes
        var pieChart = new Chart(pie_ctx, {
            type: 'pie',
            data: {
                labels: months,
                datasets: [{
                    label: 'Número de usuarios registrados',
                    data: user_counts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
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

        // Gráfico de usuarios por día
        var lineChart = new Chart(line_ctx, {
            type: 'line',
            data: {
                labels: days,
                datasets: [{
                    label: 'Número de usuarios registrados por día',
                    data: user_counts_day,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        },
                        title: {
                            display: true,
                            text: 'Fecha'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Cantidad de Usuarios'
                        }
                    }
                }
            }
        });
    </script>
@endsection



