document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('stockChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Coût', 'Prix', 'Bénéfice estimé'],
            datasets: [{
                label: 'Valeur de Stock',
                data: [55320, 75040, 19720],
                backgroundColor: ['#1abc9c', '#9b59b6', '#f39c12']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
});
