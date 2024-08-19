<?php ob_start(); ?>

<div id="topContent">
    <div class="textTopContent">
        <h1>SUPER7</h1>
        <h2></h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam fuga, adipisci rem praesentium dolorum nisi corporis incidunt quaerat quos, officia quidem quae ex, autem impedit quas distinctio eius inventore exercitationem?</p>
    </div>
    <img class="imgAccueil" src="../public/images/Desktop/headerAccueilDesktop1.jpg" alt="topSkate">
</div>

<div id="midContent">
    <p class="principalText">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam voluptates voluptatum voluptatibus expedita fuga, odio temporibus animi at! Cupiditate dolorem necessitatibus dicta magnam amet eligendi tempora sapiente? Ipsam, officiis molestias.
        Inventore quos rem at, laudantium aspernatur soluta quo facilis voluptatem atque magni! Inventore iusto, eum, possimus asperiores odit sapiente ea doloremque, amet excepturi consectetur quam accusamus animi sequi hic laborum?
        Repellendus quo voluptatibus iure voluptatum minima iste architecto accusamus magni? Deleniti, voluptatem libero! Ea eum laboriosam consequuntur a amet cumque quis cupiditate! Harum veniam asperiores ab sunt nobis odio cumque.
        Placeat fugit autem sed impedit quaerat reprehenderit facilis unde dicta? Voluptatem natus quibusdam cumque eligendi molestiae, atque iusto suscipit quis doloremque recusandae, maiores autem veniam at nesciunt rem sint aut.
        Aliquam autem omnis, esse ullam itaque enim maxime tempora vel. Unde optio at eos reiciendis corporis eaque accusamus nesciunt. Placeat suscipit at ullam harum omnis amet ipsa libero voluptatem assumenda.
    </p>
    <p class="asterisque">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ex unde et velit delectus amet, obcaecati aperiam voluptatem vero? Recusandae explicabo perspiciatis dolor cum delectus voluptatibus dolorum esse nostrum? Doloremque!
    </p>
</div>

<?php
$content = ob_get_clean();
require "template.php";
?>
