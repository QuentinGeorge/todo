<header class="wrapper grid">
    <div id="branding" class=""><a href="index.php">Todolist</a></div>
            <div class="ta-right"><a href="index.php?r=auth&a=getLogout">Déconnexion</a></div>
    </header>
<div class="main-content wrapper">
    <h1>Vos prochaines tâches</h1>
<ol class="tasks">
    <?php if (!empty($_SESSION['tasks'])): ?>
        <?php foreach ($_SESSION['tasks'] as $key => $value): ?>
                    <li>
                    <div class="task grid">
                        <div class="column--heavy">
                            <form action="index.php"
                                  method="post">
                                                            <label for="<?= $value['taskId'] ?>"
               class="checkbox ">
            <input title="Changer le statut"
                   type="checkbox"
                   id="<?= $value['taskId'] ?>"
                   name="is_done" value="1" <?php if ($value['taskIsDone'] == 1) {
                       echo 'checked="checked"';
                   } ?>
                >
            <span class="checkbox__label fs-base"><?= $value['taskDescription'] ?></span>
        </label>
        <?php if (!empty($value['editable']) && $value['editable'] == 1): ?>
            <label for="description"
                   class="textfield">
                <input type="text"
                       size="40"
                       value="<?= $value['taskDescription'] ?>"
                       name="description"
                       title="description"
                       id="description">
                <span class="textfield__label">Description</span>
            </label>
        <?php endif; ?>
                                                        <input type="hidden"
                                       name="r"
                                       value="task">
                                <input type="hidden"
                                       name="a"
                                       value="postUpdate">
                                <input type="hidden"
                                       name="id"
                                       value="<?= $value['taskId'] ?>">
                                <button type="submit">Enregistrer</button>
                            </form>
                        </div>
                        <div>
                            <form action="index.php"
              method="get">
            <button type="submit">modifier</button>
            <input type="hidden"
                   name="a"
                   value="getUpdate">
            <input type="hidden"
                   name="r"
                   value="task">
            <input type="hidden"
                   name="id"
                   value="<?= $value['taskId'] ?>">
        </form>                </div>
                        <div>
                            <form action="index.php"
              method="post">
            <button type="submit">supprimer</button>
            <input type="hidden"
                   name="a"
                   value="postDelete">
            <input type="hidden"
                   name="r"
                   value="task">
            <input type="hidden"
                   name="id"
                   value="<?= $value['taskId'] ?>">
        </form>                </div>
                    </div>
                </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ol>
<hr>
<h1>Ajouter une tâche</h1>
<form action="index.php"
      method="post">
        <label for="description"
           class="textfield"><input type="text"
                                    name="description"
                                    id="description"
                                    size="80">
        <span class="textfield__label">Description</span>
    </label>
    <input type="hidden"
           name="r"
           value="task">
    <input type="hidden"
           name="a"
           value="create">
    <button type="submit">Créer cette nouvelle tâche</button>
</form></div>
<footer class="wrapper">
    <p class="ta-right">Made by Dominique Vilain in 2016</p>
</footer>
