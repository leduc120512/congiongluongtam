<?php
function generateSlug($string)
{
    // Bỏ dấu tiếng Việt thủ công
    $accents = [
        'a' => 'áàảãạăắằẳẵặâấầẩẫậ',
        'e' => 'éèẻẽẹêếềểễệ',
        'i' => 'íìỉĩị',
        'o' => 'óòỏõọôốồổỗộơớờởỡợ',
        'u' => 'úùủũụưứừửữự',
        'y' => 'ýỳỷỹỵ',
        'd' => 'đ',
        'A' => 'ÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬ',
        'E' => 'ÉÈẺẼẸÊẾỀỂỄỆ',
        'I' => 'ÍÌỈĨỊ',
        'O' => 'ÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢ',
        'U' => 'ÚÙỦŨỤƯỨỪỬỮỰ',
        'Y' => 'ÝỲỶỸỴ',
        'D' => 'Đ'
    ];
    foreach ($accents as $nonAccent => $accentsGroup) {
        $string = preg_replace('/[' . $accentsGroup . ']/u', $nonAccent, $string);
    }

    $slug = strtolower(trim($string));
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug); // thay ký tự đặc biệt bằng dấu gạch
    $slug = preg_replace('/-+/', '-', $slug);         // loại bỏ dấu gạch liên tiếp
    return trim($slug, '-');
}
