<?php
session_start(); // Add at the very top
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    if ($_POST['submit'] === 'addtocard') {
        $product = [
            'title' => $_POST['product-title'],
            'size' => $_POST['product-size'],
            'quantity' => $_POST['product-quanity'],
            'price' => 25.00 // Static price from the product page
        ];
        $_SESSION['cart'][] = $product;
        header('Location: cart.php'); // Redirect to cart
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "include/head.php" ?>
<body>
    <!-- Header -->
    <?php include "include/header.php" ?>
    <!-- Close Header -->

    <!-- ... (existing content up to the form) ... -->

    <form action="" method="POST"> <!-- Changed to POST -->
        <input type="hidden" name="product-title" value="Activewear">
        <div class="row">
            <div class="col-auto">
                <!-- Size selection (unchanged) -->
            </div>
            <div class="col-auto">
                <ul class="list-inline pb-3">
                    <li class="list-inline-item text-right">
                        Quantity
                        <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                    </li>
                    <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                    <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                    <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                </ul>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col d-grid">
                <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
            </div>
            <div class="col d-grid">
                <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</button>
            </div>
        </div>
    </form>

    <!-- ... (remaining content) ... -->

    <!-- Add Quantity Script -->
    <script>
        document.getElementById('btn-plus').addEventListener('click', function(e) {
            e.preventDefault();
            var value = parseInt(document.getElementById('var-value').textContent);
            value++;
            document.getElementById('var-value').textContent = value;
            document.getElementById('product-quanity').value = value;
        });

        document.getElementById('btn-minus').addEventListener('click', function(e) {
            e.preventDefault();
            var value = parseInt(document.getElementById('var-value').textContent);
            if (value > 1) {
                value--;
                document.getElementById('var-value').textContent = value;
                document.getElementById('product-quanity').value = value;
            }
        });
    </script>
</body>
</html>