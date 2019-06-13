<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => 'يجب قبول :attribute',
    'without_spaces' =>'يجب أن لا يكون هناك مسافات في :attribute',
    'active_url'           => ':attribute لا يُمثّل رابطًا صحيحًا',
    'after'                => 'يجب على :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal'       => ':attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha'                => 'يجب أن لا يحتوي :attribute سوى على حروف',
    'alpha_dash'           => 'يجب أن لا يحتوي :attribute سوى على حروف، أرقام ومطّات.',
    'alpha_num'            => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
    'array'                => 'يجب أن يكون :attribute ًمصفوفة',
    'before'               => 'يجب على :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal'      => ':attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max',
        'array'   => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max',
    ],
    'boolean'              => 'يجب أن تكون قيمة :attribute إما true أو false ',
    'confirmed'            => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'date'                 => ':attribute ليس تاريخًا صحيحًا',
    'date_format'          => 'لا يتوافق :attribute مع الشكل :format.',
    'different'            => 'يجب أن يكون الحقلان :attribute و :other مُختلفان',
    'digits'               => 'يجب أن يحتوي :attribute على :digits رقمًا/أرقام',
    'digits_between'       => 'يجب أن يحتوي :attribute بين :min و :max رقمًا/أرقام ',
    'dimensions'           => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct'             => 'للحقل :attribute قيمة مُكرّرة.',
    'email'                => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية',
    'exists'               => 'القيمة المحددة :attribute غير موجودة',
    'file'                 => 'الـ :attribute يجب أن يكون ملفا.',
    'filled'               => ':attribute إجباري',
    'gt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أكبر من :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النّص :attribute أكثر من :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على أكثر من :value عناصر/عنصر.',
    ],
    'gte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النص :attribute على الأقل :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :value عُنصرًا/عناصر',
    ],
    'image'                => 'يجب أن يكون :attribute صورةً',
    'in'                   => ':attribute غير موجود',
    'in_array'             => ':attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون :attribute عددًا صحيحًا',
    'ip'                   => 'يجب أن يكون :attribute عنوان IP صحيحًا',
    'ipv4'                 => 'يجب أن يكون :attribute عنوان IPv4 صحيحًا.',
    'ipv6'                 => 'يجب أن يكون :attribute عنوان IPv6 صحيحًا.',
    'json'                 => 'يجب أن يكون :attribute نصآ من نوع JSON.',
    'lt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أصغر من :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أصغر من :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النّص :attribute أقل من :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على أقل من :value عناصر/عنصر.',
    ],
    'lte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :max.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'max'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :max.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes'                => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes'            => 'يجب أن يكون ملفًا من نوع : :values.',
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت',
        'string'  => 'يجب أن يكون طول النص :attribute على الأقل :min حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :min عُنصرًا/عناصر',
    ],
    'not_in'               => ':attribute موجود',
    'not_regex'            => 'صيغة :attribute غير صحيحة.',
    'numeric'              => 'يجب على :attribute أن يكون رقمًا',
    'present'              => 'يجب تقديم :attribute',
    'regex'                => 'صيغة :attribute .غير صحيحة',
    'required'             => ':attribute مطلوب.',
    'required_if'          => ':attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless'      => ':attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with'        => ':attribute مطلوب إذا توفّر :values.',
    'required_with_all'    => ':attribute مطلوب إذا توفّر :values.',
    'required_without'     => ':attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'same'                 => 'يجب أن يتطابق :attribute مع :other',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size',
        'file'    => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت',
        'string'  => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالضبط',
        'array'   => 'يجب أن يحتوي :attribute على :size عنصرٍ/عناصر بالضبط',
    ],
    'string'               => 'يجب أن يكون :attribute نصآ.',
    'timezone'             => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
    'unique'               => 'قيمة :attribute مُستخدمة من قبل',
    'uploaded'             => 'فشل في تحميل الـ :attribute',
    'url'                  => 'صيغة الرابط :attribute غير صحيحة',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name'                  => 'الاسم',
        'username'              => 'اسم المُستخدم',
        'email'                 => 'البريد الالكتروني',
        'first_name'            => 'الاسم الأول',
        'last_name'             => 'اسم العائلة',
        'password'              => 'كلمة السر',
        'password_confirmation' => 'تأكيد كلمة السر',
        'city'                  => 'المنطقة',
        'country'               => 'الدولة',
        'address'               => 'عنوان السكن',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الجوال',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'النوع',
        'day'                   => 'اليوم',
        'month'                 => 'الشهر',
        'year'                  => 'السنة',
        'hour'                  => 'ساعة',
        'minute'                => 'دقيقة',
        'second'                => 'ثانية',
        'title'                 => 'عنوان الموضوع',
        'content'               => 'المُحتوى',
        'description'           => 'الوصف',
        'excerpt'               => 'المُلخص',
        'date'                  => 'التاريخ',
        'time'                  => 'الوقت',
        'available'             => 'مُتاح',
        'size'                  => 'الحجم',
        'birhdate'              => 'تاريخ الميلاد',
        'idno'                  => 'رقم الهوية',
        'old_password'          => 'كلمة المرور الحالية',
        /************/
        'welcom_word'                   => 'عبارة الترحيب',
        'welcom_clouse'                 => 'نص الترحيب',
        'add_compline_clouse'                  => 'نص تقديم شكوى',
        'add_propusel_clouse'                  => 'نص تقديم اقتراح',
        'add_thanks_clouse'                => 'نص تقديم شكر',
        'follw_compline_clouse'                => 'نص متابعة شكوى',
        'how_we'                 => 'من نحن',
        /*****************///
        'circle_id'                   => 'الدائرة الوظيفية',
        'user_name'                 => 'اسم المستخدم',
        'full_name'                  => 'الإسم كاملا',
        'job_name'                  => 'المسمى الوظيفي',
        /*****************/
        'supervisor'                   => 'اسم المشرف',
        'manager'                 => 'اسم المدير',
        'coordinator'                  => 'اسم المنسق',
        'code'                  => 'الكود',
        'active'                => 'الحالة',
        'start_date'                => 'تاريخ البدء',
        'end_date'                 => 'تاريخ الانتهاء',
        /*****************///
        'id_number'                   => 'رقم الهوية',
        'governorate'                 => 'المحافظة',
        'street'                  => 'العنوان',
        'father_name'=> 'اسم الأب',
        'grandfather_name'=> 'اسم الجد',
         'type'=> 'النوع',
        'response'=> 'الرد',
		'mail' => 'البريد',
        'project_id' => 'المشروع',
        'category_id'=> 'القسم',
        'id'=> 'الرقم',
        'sent_type'=>'طريقة الإرسال',
        'mopile' => 'رقم التواصل',
        'family_center_id' => 'مركز العائلة',
        'super_admin'=> 'نوع الحساب',
        'city_id'=> 'المدينة',
        'manager_name'=> 'اسم المنسق',
        'governorate_id'=>'المحافظة',
        'neighborhood'=>'اسم الحي',
        'brth_day'=>'تاريخ الميلاد',
        'shared_ditalis'=> 'تفاصيل المشاركة',
        'changing'=>'التغير المجتمعي',
        'justifications'=>'المبررات',
        'problem'=>'المشكلة',
        'main_goale'=>'الهدف الرئيسي',
        'paid_up'=>'المبلغ المدفوع',
        'donation'=>'التبرع',
        'target_group'=>'الفئة المستهدفة',
        'start_date'=>'تاريخ البدء',
        'paid_up'=>'المبلغ المدفوع',
        'donation'=>'التبرع',
        'count'=>'مرات التنفيذ',
        'ativiests_count'=>'عدد المستفيدين',
        'initiative_id'=>'المبادرة',
        'details'=>'نبذة المبادرة',
        'detalis'=>'تفاصيل الخبر',
        'the_file'=>'محتوى الخبر',
        'image'=>'الصورة',
        'images.*'=>'صور أخرى',
        'main_image'=>'الصورة الرئيسية',
        'evaluation_others'=>'تقييمات أخرى',
        'changing'=>'دورك في التغير المجتمعي',
        'changing_ditalis'=>'تفاصيل دورك في التغير المجتمعي',
        'impacting'=>'التأثير على ظروف العيش',
        'impacting_ditalis'=>'تفاصيل التأثير على ظروف العيش',
        'continuing'=>'الاستمرار في العمل التطوعي',
        'continuing_ditalis'=>'تفاصيل الاستمرار في العمل التطوعي',
        'improving'=>'مساهمة المبادرة في التأثير',
        'improving_ditalis'=>'تفاصيل مساهمة المبادرة في التأثير',
        'title_page'=> 'عنوان المواقع',
        'project_title'=> 'اسم المشروع',
        'about_project'=> 'عن المشروع',
        'the_img1'=> 'الصورة العليا',
        'who_are'=> 'من نحن',
        'the_img2'=> 'صورة من نحن',
        'motivational_words'=> 'العبارة التحفيزية',
        'the_img3'=> 'الصورة التحفيزية',
        'experiences'=> 'التجارب الملهمة',
        'address'=> 'العنوان كاملا',
        'email'=>'البريد الإلكتروني',
        'mobile1'=> 'رقم التواصل الأول',
        'mobile2'=> 'رقم التواصل الثاني',
        'bank_account'=> 'رقم الحساب البنكي',
        'accession_msg'=> 'رسالة طلب انضمام',
        'acceptance_msg'=> 'رسالة القبول',
        'donation_msg'=> 'رسالة استلام تبرع',
        'ido'=>'رقم الهوية',
        'financier_name'=>'اسم الممول',
        'amount'=>'المبلغ',
        'initiative_id' => "اسم المبادرة",
        'bank_account' => 'الحساب المبادرة',//
        'financier_email'=> 'البريد الإلكتروني',//
        'financier_phone'=> 'رقم التواصل',//
        'country'=> "الدولة",
        'financier_address'=> 'عنوان التفصيلي',//


    ],
];
