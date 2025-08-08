// Chart: Usia Produktif
const usiaCtx = document.getElementById('usiaChart').getContext('2d');
new Chart(usiaCtx, {
    type: 'bar',
    data: {
        labels: ['15-24', '25-34', '35-44', '45-54'],
        datasets: [
            {
                label: 'Laki-laki',
                data: [2, 3, 1, 2],
                backgroundColor: '#3498db'
            },
            {
                label: 'Perempuan',
                data: [1, 1, 0, 0],
                backgroundColor: '#e74c3c'
            }
        ]
    },
    options: {
        responsive: true,
        indexAxis: 'y'
    }
});

// Chart: Warga Berdasarkan Agama
const agamaCtx = document.getElementById('agamaChart').getContext('2d');
new Chart(agamaCtx, {
    type: 'bar',
    data: {
        labels: ['Islam', 'Kristen', 'Hindu', 'Budha'],
        datasets: [{
            label: 'Jumlah',
            data: [8, 1, 0, 1],
            backgroundColor: '#1abc9c'
        }]
    }
});

// Chart: Pendidikan Warga
const pendidikanCtx = document.getElementById('pendidikanChart').getContext('2d');
new Chart(pendidikanCtx, {
    type: 'bar',
    data: {
        labels: ['SD', 'SMP', 'SMA', 'S1'],
        datasets: [{
            label: 'Jumlah',
            data: [2, 3, 4, 1],
            backgroundColor: '#9b59b6'
        }]
    }
});
