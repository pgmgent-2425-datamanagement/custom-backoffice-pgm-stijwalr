<h1>Statistics</h1>
<h2>Books by Genre</h2>
<canvas id="booksChart" width="400" height="200"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data from PHP
    const genres = <?php echo json_encode(array_column($booksCountByGenre, 'genre_name')); ?>;
    const bookCounts = <?php echo json_encode(array_column($booksCountByGenre, 'book_count')); ?>;

    // Chart.js configuration
    const ctx = document.getElementById('booksChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: genres,
            datasets: [{
                label: 'Number of Books',
                data: bookCounts,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
