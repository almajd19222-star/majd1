<?php
// ملف يحتوي على الـ Popup لعرض نتائج تحديث جدول المتابعة
// يتم تضمينه في ملف s_view_server_qayd.php

$show_popup = false;
$updated_records = [];
$not_updated_records = [];
$not_found_records = [];

// التحقق من وجود البيانات في الجلسة
if (isset($_SESSION['show_tracking_result']) && $_SESSION['show_tracking_result'] === true) {
    $show_popup = true;
    $updated_records = isset($_SESSION['tracking_updated']) ? $_SESSION['tracking_updated'] : [];
    $not_updated_records = isset($_SESSION['tracking_not_updated']) ? $_SESSION['tracking_not_updated'] : [];
    $not_found_records = isset($_SESSION['tracking_not_found']) ? $_SESSION['tracking_not_found'] : [];
    
    // حذف البيانات من الجلسة بعد استخدامها
    unset($_SESSION['show_tracking_result']);
    unset($_SESSION['tracking_updated']);
    unset($_SESSION['tracking_not_updated']);
    unset($_SESSION['tracking_not_found']);
}
?>

<?php if ($show_popup): ?>
<style>
    .tracking-modal-overlay {
        display: flex;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        align-items: center;
        justify-content: center;
        direction: rtl;
    }

    .tracking-modal-content {
        background-color: #fefefe;
        padding: 30px;
        border: 1px solid #888;
        border-radius: 10px;
        width: 90%;
        max-width: 700px;
        max-height: 80vh;
        overflow-y: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .tracking-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
    }

    .tracking-modal-header h2 {
        margin: 0;
        color: #007bff;
        font-size: 24px;
    }

    .tracking-close {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .tracking-close:hover {
        color: #000;
    }

    .tracking-section {
        margin: 20px 0;
    }

    .tracking-section-title {
        font-size: 18px;
        font-weight: bold;
        padding: 10px 15px;
        border-radius: 5px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .tracking-section-title.success {
        background-color: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .tracking-section-title.warning {
        background-color: #fff3cd;
        color: #856404;
        border-left: 4px solid #ffc107;
    }

    .tracking-section-title.danger {
        background-color: #f8d7da;
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    .tracking-section-title i {
        font-size: 20px;
    }

    .tracking-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #f9f9f9;
        border-radius: 5px;
        overflow: hidden;
    }

    .tracking-table th {
        background-color: #f1f1f1;
        padding: 12px;
        text-align: right;
        font-weight: bold;
        border-bottom: 2px solid #ddd;
        color: #333;
    }

    .tracking-table td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
        text-align: right;
    }

    .tracking-table tr:hover {
        background-color: #f5f5f5;
    }

    .tracking-badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .tracking-badge.success {
        background-color: #28a745;
        color: white;
    }

    .tracking-badge.warning {
        background-color: #ffc107;
        color: #333;
    }

    .tracking-badge.danger {
        background-color: #dc3545;
        color: white;
    }

    .tracking-empty {
        text-align: center;
        padding: 20px;
        color: #666;
        font-style: italic;
    }

    .tracking-modal-footer {
        margin-top: 20px;
        text-align: center;
        padding-top: 15px;
        border-top: 1px solid #ddd;
    }

    .tracking-close-btn {
        background-color: #007bff;
        color: white;
        padding: 10px 30px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .tracking-close-btn:hover {
        background-color: #0056b3;
    }

    .tracking-icon {
        font-size: 16px;
        margin-left: 5px;
    }
</style>

<div class="tracking-modal-overlay" id="trackingModal">
    <div class="tracking-modal-content">
        <div class="tracking-modal-header">
            <h2>نتائج تحديث جدول المتابعة</h2>
            <span class="tracking-close" onclick="closeTrackingModal()">&times;</span>
        </div>

        <!-- السجلات التي تم تحديثها -->
        <?php if (count($updated_records) > 0): ?>
        <div class="tracking-section">
            <div class="tracking-section-title success">
                <i class="zwicon-checkmark-circle"></i>
                السجلات المحدثة بنجاح (<?php echo count($updated_records); ?>)
            </div>
            <table class="tracking-table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الحالة الجديدة</th>
                        <th>رقم الكتاب</th>
                        <th>التاريخ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($updated_records as $record): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($record['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <span class="tracking-badge success">
                                <?php echo htmlspecialchars($record['new_status'], ENT_QUOTES, 'UTF-8'); ?>
                                <i class="zwicon-checkmark tracking-icon"></i>
                            </span>
                        </td>
                        <td><?php echo htmlspecialchars($record['ketab_num'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($record['ketab_date'], ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>

        <!-- السجلات التي لم يتم تحديثها -->
        <?php if (count($not_updated_records) > 0): ?>
        <div class="tracking-section">
            <div class="tracking-section-title warning">
                <i class="zwicon-alert-circle"></i>
                السجلات الموجودة لكن لم يتم تحديثها (<?php echo count($not_updated_records); ?>)
            </div>
            <table class="tracking-table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الحالة الحالية</th>
                        <th>السبب</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($not_updated_records as $record): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($record['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <span class="tracking-badge warning">
                                <?php echo htmlspecialchars($record['current_status'], ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                        </td>
                        <td><?php echo htmlspecialchars($record['reason'], ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>

        <!-- الأسماء غير الموجودة -->
        <?php if (count($not_found_records) > 0): ?>
        <div class="tracking-section">
            <div class="tracking-section-title danger">
                <i class="zwicon-times-circle"></i>
                الأسماء غير الموجودة في جدول المتابعة (<?php echo count($not_found_records); ?>)
            </div>
            <table class="tracking-table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($not_found_records as $record): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($record['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <span class="tracking-badge danger">
                                <?php echo htmlspecialchars($record['reason'], ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>

        <!-- إذا لم تكن هناك أي نتائج -->
        <?php if (count($updated_records) == 0 && count($not_updated_records) == 0 && count($not_found_records) == 0): ?>
        <div class="tracking-empty">
            <p>لم يتم العثور على أي بيانات لتحديثها في جدول المتابعة</p>
        </div>
        <?php endif; ?>

        <div class="tracking-modal-footer">
            <button class="tracking-close-btn" onclick="closeTrackingModal()">إغلاق</button>
        </div>
    </div>
</div>

<script>
    function closeTrackingModal() {
        const modal = document.getElementById('trackingModal');
        if (modal) {
            modal.style.display = 'none';
        }
    }

    // إغلاق الـ modal عند الضغط على خارجه
    window.onclick = function(event) {
        const modal = document.getElementById('trackingModal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }

    // إظهار الـ modal عند التحميل
    window.onload = function() {
        const modal = document.getElementById('trackingModal');
        if (modal) {
            modal.style.display = 'flex';
        }
    }
</script>
<?php endif; ?>
