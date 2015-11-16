<div class="container content margin_bottom">
    <div class="col-md-9">
        <h1></h1>
        <hr>
        <h3>Страница которую вы ищете, не найдена.</h3>
    </div>
    <div class="col-md-3 margin_top">
        <h3>Направления работы</h3>
        <div class="list-group">
            <?foreach($data['categories'] as $category_item){?>
                <a href="<?echo Href::a('category/view/'.$category_item['id']);?>" class="list-group-item <? echo ($category_item["id"]==$data["id_cat"]?'active':'oop');?>">
                    <?=$category_item['title']?>
                </a>
            <?}?>

        </div>
    </div>
</div>