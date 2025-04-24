<div class="owl-carousel-wrapper">

      

      <div class="box-92819">
        <h1 class="text-white mb-3">Publications</h1>
        <p class="lead text-white">Stay informed with our latest articles on healthcare, human rights, advocacy, stakeholders’ engagement and community development. Explore stories, research findings, and updates from our initiatives to make a lasting impact.</p>
      </div>

      
        <div class="ftco-cover-1 overlay" style="background-image: url('images/hero_2.jpg');"></div>
      
</div>

<?php
include_once 'config.php';

$limit = 5; // Number of posts per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Count total records for pagination
$total_query = "SELECT COUNT(id) AS total FROM publications";
$total_result = $db->query($total_query);
$total = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total / $limit);

// Fetch publications with pagination
$query = "SELECT * FROM publications ORDER BY created_at DESC LIMIT $start, $limit";
$result = $db->query($query);
?>

<div class="site-section">
    <div class="container">
        <div class="heading-20219 mb-5">
            <h2 class="title text-cursive">Latest Publications</h2>
        </div>

        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-6">
                    <div class="event-29191 mb-5">
                        <a href="publication?id=<?php echo $row['id']; ?>" class="d-block mb-3">
                            <img src="assets/images/publication/<?php echo $row['photo']; ?>" alt="<?php echo $row['title']; ?>" class="img-fluid rounded">
                        </a>
                        <div class="px-3 d-flex">
                            <div class="bg-primary p-3 d-inline-block text-center rounded mr-4 date">
                                <span style="padding-top: 30px" class="text-white h3 m-0 d-block"><?php echo date('d', strtotime($row['created_at'])); ?></span>
                                <span class="text-white small"><?php echo date('M Y', strtotime($row['created_at'])); ?></span>
                            </div>
                            <div>
                                <h3><a href="publication?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
                                <p>
                                    <?php 
                                        $words = explode(' ', $row['intro']); 
                                        echo implode(' ', array_slice($words, 0, 20)) . (count($words) > 20 ? '...' : ''); 
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="col-12 text-center">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>" class="p-3">Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" class="p-3 <?php echo ($i == $page) ? 'font-weight-bold' : ''; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page + 1; ?>" class="p-3">Next</a>
            <?php endif; ?>
        </div>

    </div>
</div>
