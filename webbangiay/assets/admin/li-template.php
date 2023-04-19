<li>
  <div class="menu-prop menu-name" style="width: 301px;"><?= str_repeat("---", $num - 1) . $row['name'] ?></div>
  <div class="menu-prop menu-time"><?= date('d/m/Y H:i', $row['created_time']) ?></div>
  <div class="menu-prop menu-time"><?= date('d/m/Y H:i', $row['last_updated']) ?></div>
  <div class="menu-prop menu-button">
    <a href="./<?= $config_name ?>_editing.php?id=<?= $row['id'] ?>">Sửa</a>
  </div>
  <div class="menu-prop menu-button">
    <a href="./<?= $config_name ?>_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('bạn thật sự muốn xóa ?');">Xóa</a>
  </div>
  <!-- <div class="menu-prop menu-button">
        <a href="./<?= $config_name ?>_editing.php?id=<?= $row['id'] ?>&task=copy">Copy</a>
    </div> -->
  <div class="clear-both"></div>
</li>