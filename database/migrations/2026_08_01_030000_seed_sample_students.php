<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private const SAMPLE_COUNT = 100;
    private const EMAIL_DOMAIN = 'sample.kidoo.test';

    /**
     * Run the migrations.
     *
     * Inserts 100 sample students, each with a full father/mother parent
     * record, for demo/dev environments. Rows are tagged (students.slug =
     * "sample-student-N", parents.email @sample.kidoo.test) so down() can
     * remove exactly what up() created.
     */
    public function up(): void
    {
        $school_id = DB::table('schools')->orderBy('id')->value('id');
        if (!$school_id) {
            return;
        }

        $classIds = DB::table('classes')
            ->where('school_id', $school_id)
            ->whereNull('deleted_at')
            ->orderBy('id')
            ->pluck('id')
            ->all();

        $surnames = ['Nguyễn', 'Trần', 'Lê', 'Phạm', 'Hoàng', 'Huỳnh', 'Phan', 'Vũ', 'Võ', 'Đặng', 'Bùi', 'Đỗ', 'Hồ', 'Ngô', 'Dương', 'Lý'];
        $maleNames = ['An', 'Bình', 'Dũng', 'Đức', 'Hải', 'Hiếu', 'Huy', 'Khánh', 'Long', 'Minh', 'Nam', 'Phong', 'Quang', 'Sơn', 'Thắng', 'Tuấn', 'Việt'];
        $femaleNames = ['Chi', 'Giang', 'Hà', 'Hạnh', 'Hoa', 'Lan', 'Linh', 'Mai', 'Nga', 'Ngọc', 'Nhi', 'Phương', 'Thảo', 'Thủy', 'Trang', 'Vân', 'Yến'];
        $streets = ['Lê Lợi', 'Trần Phú', 'Nguyễn Huệ', 'Hai Bà Trưng', 'Kim Mã', 'Cầu Giấy', 'Xuân Thủy', 'Láng Hạ', 'Hoàng Quốc Việt', 'Nguyễn Trãi'];
        $districts = ['Ba Đình', 'Cầu Giấy', 'Đống Đa', 'Hai Bà Trưng', 'Hoàn Kiếm', 'Thanh Xuân', 'Tây Hồ', 'Long Biên'];

        $now = now();

        for ($i = 1; $i <= self::SAMPLE_COUNT; $i++) {
            $isMale = $i % 2 === 0;
            $surname = $surnames[array_rand($surnames)];
            $givenName = $isMale ? $maleNames[array_rand($maleNames)] : $femaleNames[array_rand($femaleNames)];
            $middleName = $isMale ? 'Văn' : 'Thị';
            $studentName = "{$surname} {$middleName} {$givenName}";

            $fatherSurname = $surnames[array_rand($surnames)];
            $motherSurname = $surnames[array_rand($surnames)];
            $fatherName = "{$fatherSurname} Văn " . $maleNames[array_rand($maleNames)];
            $motherName = "{$motherSurname} Thị " . $femaleNames[array_rand($femaleNames)];

            $father_id = DB::table('parents')->insertGetId([
                'school_id' => $school_id,
                'name' => $fatherName,
                'email' => "sample.father{$i}@" . self::EMAIL_DOMAIN,
                'phone' => '09' . str_pad((string) (10000000 + $i * 2), 8, '0', STR_PAD_LEFT),
                'gender' => 'male',
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $mother_id = DB::table('parents')->insertGetId([
                'school_id' => $school_id,
                'name' => $motherName,
                'email' => "sample.mother{$i}@" . self::EMAIL_DOMAIN,
                'phone' => '09' . str_pad((string) (10000001 + $i * 2), 8, '0', STR_PAD_LEFT),
                'gender' => 'female',
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $ageYears = mt_rand(3, 11);
            $birthdate = $now->copy()->subYears($ageYears)->subDays(mt_rand(0, 364))->format('Y-m-d');

            $studentSlug = 'sample-student-' . $i;

            $student_id = DB::table('students')->insertGetId([
                'school_id' => $school_id,
                'name' => $studentName,
                'address' => 'Số ' . mt_rand(1, 200) . ' ' . $streets[array_rand($streets)] . ', ' . $districts[array_rand($districts)] . ', Hà Nội',
                'birthdate' => $birthdate,
                'gender' => $isMale ? 'male' : 'female',
                'slug' => $studentSlug,
                'father_id' => $father_id,
                'mother_id' => $mother_id,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            if (!empty($classIds)) {
                DB::table('class_student')->insert([
                    'class_id' => $classIds[($i - 1) % count($classIds)],
                    'student_id' => $student_id,
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $studentIds = DB::table('students')
            ->where('slug', 'like', 'sample-student-%')
            ->pluck('id');

        DB::table('class_student')->whereIn('student_id', $studentIds)->delete();

        $parentIds = DB::table('students')
            ->whereIn('id', $studentIds)
            ->get(['father_id', 'mother_id'])
            ->flatMap(fn ($s) => [$s->father_id, $s->mother_id])
            ->filter()
            ->unique();

        DB::table('students')->whereIn('id', $studentIds)->delete();
        DB::table('parents')->whereIn('id', $parentIds)->delete();
    }
};
