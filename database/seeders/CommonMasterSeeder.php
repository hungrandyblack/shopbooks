<?php

namespace Database\Seeders;

use App\Models\CommonMaster;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;

class CommonMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            $this->run_local();
        }
        if (App::environment('staging')) {
            $this->run_staging();
        }
        if (App::environment('production')) {
            $this->run_production();
        }
    }

    private function run_local()
    {
        DB::table('common_masters')->delete();

        CommonMaster::upsert([
            'id' => 1,
            'common_type' => 'MAILTEMPLATE',
            'common_code' => 'RESET_PASSWORD_MAILTEMLATE',
            'common_default' => false,
            'display_name' => 'パスワード再設定',
            'common_string1' => 'パスワード再設定',
            'common_string2' => 'リセットURL: ${link_reset}',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 2,
            'common_type' => 'MAILTEMPLATE',
            'common_code' => 'ACTIVE_ACCOUNT_MAILTEMLATE',
            'common_default' => false,
            'display_name' => 'パスワード初期設定',
            'common_string1' => 'パスワード初期設定',
            'common_string2' => 'パスワード初期設定URL: ${link_activate}',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 3,
            'common_type' => 'BATCH_CONFIG',
            'common_code' => 'HEADER_CLIENT_CSV',
            'common_default' => true,
            'display_name' => 'client.csvのタイトル',
            'common_string1' => 'account,db',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 4,
            'common_type' => 'NAYOSE_SETTING_OPTION',
            'common_code' => 'OPTION_1',
            'common_default' => false,
            'display_name' => '会員名寄せ',
            'common_string1' => '会員名寄せをする',
            'common_string2' => '会員名寄せをしない',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 5,
            'common_type' => 'NAYOSE_SETTING_OPTION',
            'common_code' => 'OPTION_2',
            'common_default' => false,
            'display_name' => '非会員名寄せ',
            'common_string1' => '非会員名寄せをする',
            'common_string2' => '非会員名寄せをしない',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 6,
            'common_type' => 'NAYOSE_SETTING_OPTION',
            'common_code' => 'OPTION_3',
            'common_default' => false,
            'display_name' => '会員⇔非会員 間での名寄せ',
            'common_string1' => '会員⇔非会員 間での名寄せをする',
            'common_string2' => '会員⇔非会員 間での名寄せをしない',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 7,
            'common_type' => 'NAYOSE_SETTING_PATTERN',
            'common_code' => 'PATTERN_1',
            'common_default' => true,
            'display_name' => '名寄せ設定パターン1',
            'common_string1' => '111',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 8,
            'common_type' => 'NAYOSE_SETTING_PATTERN',
            'common_code' => 'PATTERN_2',
            'common_default' => false,
            'display_name' => '名寄せ設定パターン2',
            'common_string1' => '000',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 9,
            'common_type' => 'NAYOSE_SETTING_PATTERN',
            'common_code' => 'PATTERN_3',
            'common_default' => false,
            'display_name' => '名寄せ設定パターン3',
            'common_string1' => '101',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 10,
            'common_type' => 'BATCH_CONFIG',
            'common_code' => 'CLIENT_FILE',
            'common_default' => false,
            'display_name' => 'File name and file path of client list',
            'common_string1' => 'client.csv',
            'common_string2' => '', // file path
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 11,
            'common_type' => 'BATCH_CONFIG',
            'common_code' => 'SETTING_FILE1',
            'common_default' => false,
            'display_name' => 'File name and file path of upload setting file 1',
            'common_string1' => 'pattern_and_condition.csv',
            'common_string2' => '', // file path
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 20,
            'common_type' => 'BATCH_CONFIG',
            'common_code' => 'SETTING_FILE2',
            'common_default' => false,
            'display_name' => 'File name and file path of upload setting file 2',
            'common_string1' => 'except_code.csv',
            'common_string2' => '', // file path
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);
        //
        CommonMaster::upsert([
            'id' => 12,
            'common_type' => 'DATATABLE_LENGTH_MENU',
            'common_code' => 'ITEM_1',
            'common_default' => true,
            'display_name' => '10',
            'common_string1' => '10',
            'common_string2' => '',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);
        CommonMaster::upsert([
            'id' => 13,
            'common_type' => 'DATATABLE_LENGTH_MENU',
            'common_code' => 'ITEM_2',
            'common_default' => false,
            'display_name' => '50',
            'common_string1' => '50',
            'common_string2' => '',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);
        CommonMaster::upsert([
            'id' => 14,
            'common_type' => 'DATATABLE_LENGTH_MENU',
            'common_code' => 'ITEM_3',
            'common_default' => false,
            'display_name' => '100',
            'common_string1' => '100',
            'common_string2' => '',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);
        CommonMaster::upsert([
            'id' => 15,
            'common_type' => 'DATATABLE_LENGTH_MENU',
            'common_code' => 'ITEM_4',
            'common_default' => false,
            'display_name' => '500',
            'common_string1' => '500',
            'common_string2' => '',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 16,
            'common_type' => 'STANDARD_CONDITION',
            'common_code' => 'CONDITION_1',
            'common_default' => true,
            'display_name' => '名寄せ基準1',
            'common_string1' => '氏名と電話番号',
            'common_string2' => '',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 17,
            'common_type' => 'BUCKET_CONFIG',
            'common_code' => 'READING_CLIENT',
            'common_default' => true,
            'display_name' => 'Bucket name for reading client batch',
            'common_string1' => 'test-nayose-get-client-batch',
            'common_string2' => '',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 18,
            'common_type' => 'BUCKET_CONFIG',
            'common_code' => 'UPLOAD_SETTING',
            'common_default' => true,
            'display_name' => 'Bucket name for upload setting',
            'common_string1' => 'test-nayose-send-setting-file-batch',
            'common_string2' => '',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);

        CommonMaster::upsert([
            'id' => 19,
            'common_type' => 'BUCKET_CONFIG',
            'common_code' => 'READING_RESULT',
            'common_default' => true,
            'display_name' => 'Bucket name for reading nayose result',
            'common_string1' => '',
            'common_string2' => '',
            'created_by' => 0,
            'updated_by' => 0
        ], ['id']);
    }

    private function run_staging()
    {
        $this->run_local();
    }

    private function run_production()
    {
        $this->run_local();
    }
}
