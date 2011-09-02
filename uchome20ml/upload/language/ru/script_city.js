/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: script_city.js 11751 2009-03-23 10:20:50Z zhengqingpeng $
*/

function setcity(provinceid, cityid) {
	var province = document.getElementById(provinceid).value;
    switch (province) {
        case "Anhui" :
            var cityOptions = new Array(
            "Hefei(*)", "Hefei",
            "Anqing", "Anqing",
            "Bengbu", "Bengbu",
            "Bozhou", "Bozhou",
            "Lake", "Lake",
            "Chuzhou", "Chuzhou",
            "Fuyang", "Fuyang",
            "Guichi", "Guichi",
            "Huaibei", "Huaibei",
            "Huai", "Huai",
            "Huainan", "Huainan",
            "Huang Shan", "Huang Shan",
            "Nine Mountain", "Nine Mountain",
            "Luan", "Luan",
            "MOS", "MOS",
            "Suzhou", "Suzhou",
            "Tong", "Tong",
            "Tunxi", "Tunxi",
            "Wuhu", "Wuhu",
            "Xuancheng", "Xuancheng");
             break;
        case "Beijing" :
            var cityOptions = new Array(
            "East Side", "East Side",
            "West", "West",
            "Chongwen", "Chongwen",
            "Xuanwu", "Xuanwu",
            "Sunrise", "Sunrise",
            "Fengtai", "Fengtai",
            "Shijingshan", "Shijingshan",
            "Haidian", "Haidian",
            "Mentougou", "Mentougou",
            "Fangshan", "Fangshan",
            "Tongzhou", "Tongzhou",
            "Shunyi", "Shunyi",
            "Changping", "Changping",
            "Hing", "Hing",
            "Pinggu", "Pinggu",
            "Appeasement", "Appeasement",
            "Cloudy", "Cloudy",
            "Yanqing", "Yanqing");
            break;
        case "Chongqing" :
            var cityOptions = new Array(
            "Wanzhou", "Wanzhou",
            "Fulin", "Fulin",
            "Yuzhong", "Yuzhong",
            "Great Ferry", "Great Ferry",
            "Jiangbei", "Jiangbei",
            "Shapingba", "Shapingba",
            "Jiulongpo","Jiulongpo",
            "South Bank", "South Bank",
            "Beibei", "Beibei",
            "Pine Valley", "Pine Valley",
            "Two-Jiao", "Two-Jiao",
            "Yubei", "Yubei",
            "Banan", "Banan",
            "Qianjiang", "Qianjiang",
            "Longevity", "Longevity",
            "Qijiang", "Qijiang",
            "Tongnan", "Tongnan",
            "Tongliang", "Tongliang",
            "Big Foot", "Big Foot",
            "Rongchang", "Rongchang",
            "Bishan", "Bishan",
            "Liang", "Liang",
            "City I", "City I",
            "Fengdu", "Fengdu",
            "Dianjian", "Dianjian",
            "Wulong", "Wulong",
            "Zhong County", "Zhong County",
            "Kai County", "Kai County",
            "Yunyang", "Yunyang",
            "Fengjie", "Fengjie",
            "Wu", "Wu",
            "Wuxi", "Wuxi",
            "Pillars", "Pillars",
            "Xiushan", "Xiushan",
            "Youyang", "Youyang",
            "Pengshui", "Pengshui",
            "Jiangjin", "Jiangjin",
            "Hechuan", "Hechuan",
            "Yongchuan", "Yongchuan",
            "Nanchuan", "Nanchuan");
            break;
        case "Fujian" :
            var cityOptions = new Array(
            "Fuzhou(*)", "Fuzhou",
            "Fu", "Fu",
            "Longyan", "Longyan",
            "Nanping", "Nanping",
            "Ningde", "Ningde",
            "Putian", "Putian",
            "Quanzhou", "Quanzhou",
            "Sanming", "Sanming",
            "Shaowu", "Shaowu",
            "Stone", "Stone",
            "Jinjiang", "Jinjiang",
            "Wing", "Wing",
            "Mount", "Mount",
            "Xiamen", "Xiamen",
            "Zhangzhou", "Zhangzhou");
             break;
        case "Gansu" :
            var cityOptions = new Array(
            "Lanzhou(*)", "Lanzhou",
            "Silver", "Silver",
            "Will the West", "Will the West",
            "Dunhuang", "Dunhuang",
            "Gannan", "Gannan",
            "Kim Chang", "Kim Chang",
            "Jiuquan", "Jiuquan",
            "Linxia", "Linxia",
            "Pingliang", "Pingliang",
            "Tianshui", "Tianshui",
            "Wudu", "Wudu",
            "Wuwei", "Wuwei",
            "Xifeng", "Xifeng",
            "Jiayuguan","Jiayuguan",
            "Zhangye", "Zhangye");
            break;
        case "Guangdong" :
            var cityOptions = new Array(
            "Guangzhou(*)", "Guangzhou",
            "Chaoyang", "Chaoyang",
            "Chaozhou", "Chaozhou",
            "Chenghai", "Chenghai",
            "Dongguan", "Dongguan",
            "Foshan", "Foshan",
            "Heyuan", "Heyuan",
            "Huizhou", "Huizhou",
            "Jiangmen", "Jiangmen",
            "Jieyang", "Jieyang",
            "Ping", "Ping",
            "Maoming", "Maoming",
            "Meizhou", "Meizhou",
            "Qingyuan", "Qingyuan",
            "Shantou", "Shantou",
            "Shanwei", "Shanwei",
            "Shaoguan", "Shaoguan",
            "Shenzhen", "Shenzhen",
            "Shun", "Shun",
            "Yangjian", "Yangjian",
            "Britain and Germany", "Britain and Germany",
            "Yunfu", "Yunfu",
            "Zengcheng", "Zengcheng",
            "Zhanjiang", "Zhanjiang",
            "Zhaoqing", "Zhaoqing",
            "Zhong Shan", "Zhong Shan",
            "Zhuhai", "Zhuhai");
            break;
        case "Guangxi" :
            var cityOptions = new Array(
            "Nanning(*)", "Nanning",
            "Baise", "Baise",
            "North Sea", "North Sea",
            "Guilin", "Guilin",
            "Fangchenggang", "Fangchenggang",
            "Hechi", "Hechi",
            "Hezhou", "Hezhou",
            "Liuzhou", "Liuzhou",
            "Guest", "Guest",
            "Yen Chow", "Yen Chow",
            "Wuzhou", "Wuzhou",
            "Guigang", "Guigang",
            "Yulin", "Yulin");
            break;
        case "Guizhou" :
            var cityOptions = new Array(
            "Guiyang(*)", "Guiyang",
            "Anshun", "Anshun",
            "Bijie", "Bijie",
            "Duyun", "Duyun",
            "Carey", "Carey",
            "Liupanshui", "Liupanshui",
            "Tongren", "Tongren",
            "Xingyi", "Xingyi",
            "Yuping", "Yuping",
            "Zunyi", "Zunyi");
            break;
        case "Hainan" :
            var cityOptions = new Array(
            "Haikou(*)", "Haikou",
		"Sanya", "Sanya",
		"Five Fingers", "Five Fingers",
		"Qionghai", "Qionghai",
		"Dan states", "Dan states",
		"Wen Chang", "Wen Chang",
		"Mannings", "Mannings",
		"Orient", "Orient",
		"Ding-an", "Ding-an",
		"Tunchang", "Tunchang",
		"Chengmai", "Chengmai",
		"The High", "The High",
		"Mannings", "Mannings",
		"Baisha Li", "Baisha Li",
		"Changjiang Li", "Changjiang Li",
		"Le Dong Li", "Le Dong Li",
		"Lingshui Li", "Lingshui Li",
		"Baoting Li", "Baoting Li",
		"Qiongzhong Li", "Qiongzhong Li",
		"Paracel Islands", "Paracel Islands",
		"Nansha Islands", "Nansha Islands",
		"Islands in the sand", "Islands in the sand"
            );
            break;
        case "Hebei" :
            var cityOptions = new Array(
            "Shijiazhuang(*)", "Shijiazhuang",
            "Baoding", "Baoding",
            "Beidaihe", "Beidaihe",
            "Cangzhou", "Cangzhou",
            "Chengde", "Chengde",
            "Rich", "Rich",
            "Handan", "Handan",
            "Hengshui", "Hengshui",
            "Langfang", "Langfang",
            "Nandaihe", "Nandaihe",
            "Qinhuangdao", "Qinhuangdao",
            "Tangshan", "Tangshan",
            "New City", "New City",
            "Xingtai", "Xingtai",
            "Zhangjiakou", "Zhangjiakou");
            break;
        case "Heilongjiang" :
            var cityOptions = new Array(
            "Harbin(*)", "Harbin",
            "Pac", "Pac",
            "Daqing", "Daqing",
            "Daxinganling", "Daxinganling",
            "Hegang", "Hegang",
            "Hei", "Hei",
            "Jiamusi", "Jiamusi",
            "Jixi", "Jixi",
            "Mudanjiang", "Mudanjiang",
            "Qiqihar", "Qiqihar",
            "Qitaihe", "Qitaihe",
            "Shuangyashan", "Shuangyashan",
            "Suihua", "Suihua",
            "Yichun", "Yichun");
            break;
        case "Henan" :
            var cityOptions = new Array(
            "Zhengzhou(*)", "Zhengzhou",
            "Anyang", "Anyang",
            "Hebi", "Hebi",
            "Huangchuan", "Huangchuan",
            "Jiaozuo", "Jiaozuo",
            "Jiyuan", "Jiyuan",
            "Kaifeng", "Kaifeng",
            "Luohe", "Luohe",
            "Luoyang", "Luoyang",
            "Nanyan", "Nanyan",
            "Pingdingshan", "Pingdingshan",
            "Puyang", "Puyang",
            "Sanmenxia", "Sanmenxia",
            "Shangqiu", "Shangqiu",
            "Xinxiang", "Xinxiang",
            "Xinyang", "Xinyang",
            "Xuchang", "Xuchang",
            "Zhoukou", "Zhoukou",
            "Zhumadian", "Zhumadian");
            break;
        case "Hong Kong" :
            var cityOptions = new Array(
            "Hong Kong", "Hong Kong",
            "Kowloon", "Kowloon",
            "New Territorie", "New Territorie");
            break;
        case "Hubei" :
            var cityOptions = new Array(
            "Wuhan(*)", "Wuhan",
            "Enshi", "Enshi",
            "Ezhou", "Ezhou",
            "Huanggan", "Huanggan",
            "Yellowstone", "Yellowstone",
            "Jingmen", "Jingmen",
            "Jingzhou", "Jingzhou",
            "Qianjiang", "Qianjiang",
            "Shiyan", "Shiyan",
            "Suizhou", "Suizhou",
            "Wuxue", "Wuxue",
            "Bristol", "Bristol",
            "Teachers", "Teachers",
            "Xiangyang", "Xiangyang",
            "Xiangfan", "Xiangfan",
            "Xiaogan", "Xiaogan",
            "Yichang", "Yichang");
            break;
        case "Hunan" :
            var cityOptions = new Array(
            "Changsha(*)", "Changsha",
            "Changde", "Changde",
            "Chenzhou", "Chenzhou",
            "Hengyang", "Hengyang",
            "Teachers", "Teachers",
            "Morality", "Morality",
            "Loudi", "Loudi",
            "Shaoyang", "Shaoyang",
            "Pattern", "Pattern",
            "Yiyang", "Yiyang",
            "Yueyang", "Yueyang",
            "Yongzhou", "Yongzhou",
            "Zhangjiajie", "Zhangjiajie",
            "Zhuzhou", "Zhuzhou");
            break;
        case "Jiangsu" :
            var cityOptions = new Array(
            "Nanjing(*)", "Nanjing",
            "Changshu", "Changshu",
            "Changzhou", "Changzhou",
            "Sea gate", "Sea gate",
            "Huai", "Huai",
            "Jiangdu", "Jiangdu",
            "Jiangyin", "Jiangyin",
            "Kunshan", "Kunshan",
            "Lianyungan", "Lianyungan",
            "Nantong", "Nantong",
            "Qidong", "Qidong",
            "Shuyang", "Shuyang",
            "Suqian", "Suqian",
            "Suzhou", "Suzhou",
            "Taicang", "Taicang",
            "Taizhou", "Taizhou",
            "Tong Li", "Tong Li",
            "Wuxi", "Wuxi",
            "Xuzhou", "Xuzhou",
            "Yancheng", "Yancheng",
            "Yangzhou", "Yangzhou",
            "Yixing", "Yixing",
            "Yizheng", "Yizheng",
            "Zhangjiagan", "Zhangjiagan",
            "Zhenjiang", "Zhenjiang",
            "Zhouzhuang", "Zhouzhuang");
            break;
        case "Jiangxi" :
            var cityOptions = new Array(
            "Nanchang(*)", "Nanchang",
            "Fuzhou", "Fuzhou",
            "Ganzhou", "Ganzhou",
            "Jian", "Jian",
            "Jingdezhen", "Jingdezhen",
            "Jinggangshan", "Jinggangshan",
            "Jiujiang", "Jiujiang",
            "Lushan", "Lushan",
            "Pingxiang", "Pingxiang",
            "Shangrao", "Shangrao",
            "Xinyu", "Xinyu",
            "Yichun", "Yichun",
            "Yingtan", "Yingtan");
            break;
        case "Jilin" :
            var cityOptions = new Array(
            "Changchun(*)", "Changchun",
            "White City", "White City",
            "White Mountain", "White Mountain",
            "Hui Chun", "Hui Chun",
            "Liaoyuan", "Liaoyuan",
            "Meihe", "Meihe",
            "Jilin", "Jilin",
            "Siping", "Siping",
            "Matsubara", "Matsubara",
            "Tonghua", "Tonghua",
            "Yanji", "Yanji");
            break;
        case "Liaoning" :
            var cityOptions = new Array(
            "Shenyang(*)", "Shenyang",
            "Anshan", "Anshan",
            "Benxi", "Benxi",
            "Sun", "Sun",
            "Dalian", "Dalian",
            "Danton", "Danton",
            "Fushun", "Fushun",
            "Fuxin", "Fuxin",
            "Huludao", "Huludao",
            "Jinzhou", "Jinzhou",
            "Liaoyang", "Liaoyang",
            "Panjin", "Panjin",
            "Tieling", "Tieling",
            "Yingkou", "Yingkou");
            break;
        case "Macao" :
            var cityOptions = new Array(
            "Macao", "Macao");
            break;
        case "Inner Mongolia" :
            var cityOptions = new Array(
            "Hohhot(*)", "Hohhot",
            "Alashan", "Alashan",
            "Contractor", "Contractor",
            "Chifeng", "Chifeng",
            "Dongsheng", "Dongsheng",
            "Hailar", "Hailar",
            "Jining", "Jining",
            "Linhe", "Linhe",
            "Tongliao", "Tongliao",
            "Wuhai", "Wuhai",
            "Ulanhot", "Ulanhot",
            "Xilin Hot", "Xilin Hot");
            break;
        case "Ningxia" :
            var cityOptions = new Array(
            "Yinchuan(*)", "Yinchuan",
            "Guyuan", "Guyuan",
            "Defender", "Defender",
            "Shizuisha", "Shizuisha",
            "Wu Zhong", "Wu Zhong");
            break;
        case "Qinghai" :
            var cityOptions = new Array(
            "Xinin(*)", "Xinin",
            "Delhi", "Delhi",
            "Golmud", "Golmud",
            "Republican", "Republican",
            "Korean", "Korean",
            "Haiyan", "Haiyan",
            "Maqin", "Maqin",
            "Colleagues", "Colleagues",
            "Yushu", "Yushu");
            break;
        case "Shandong" :
            var cityOptions = new Array(
            "Jinan(*)", "Jinan",
            "Binzhou", "Binzhou",
            "Yanzhou", "Yanzhou",
            "Texas", "Texas",
            "Dongying", "Dongying",
            "Heze", "Heze",
            "Jining", "Jining",
            "Laiwu", "Laiwu",
            "Normal", "Normal",
            "Linyi", "Linyi",
            "Penglai", "Penglai",
            "Qingdao", "Qingdao",
            "Qufu", "Qufu",
            "Sunshine", "Sunshine",
            "Tai", "Tai",
            "Weifang", "Weifang",
            "Weihai", "Weihai",
            "Yantai", "Yantai",
            "Zaozhuan", "Zaozhuan",
            "Zibo", "Zibo");
            break;
        case "Shanghai" :
            var cityOptions = new Array(
            "Chongming", "Chongming",
            "Huangpu", "Huangpu",
            "Luwan", "Luwan",
            "Xuhui", "Xuhui",
            "Changning", "Changning",
            "Jing", "Jing",
            "Po", "Po",
            "Zhabei", "Zhabei",
            "Hongkou", "Hongkou",
            "Yangpu", "Yangpu",
            "Min OK", "Min OK",
            "Baoshan", "Baoshan",
            "Jiading", "Jiading",
            "Pudong", "Pudong",
            "Gold Mountain", "Gold Mountain",
            "Matsue", "Matsue",
            "Qingpu", "Qingpu",
            "Nanhui", "Nanhui",
            "Fengxian", "Fengxian",
            "Zhujiajiao", "Zhujiajiao");
            break;
        case "Shanxi" :
            var cityOptions = new Array(
            "Taiyuan(*)", "Taiyuan",
            "Changzhi", "Changzhi",
            "Great Harmony", "Great Harmony",
            "On horse", "On horse",
            "Jincheng", "Jincheng",
            "Lishi", "Lishi",
            "Linfen", "Linfen",
            "Ningwu", "Ningwu",
            "Shuozhou", "Shuozhou",
            "Xinzhou", "Xinzhou",
            "Yangquan", "Yangquan",
            "Yuci", "Yuci",
            "Lucky", "Lucky");
            break;
        case "Shaanxi" :
            var cityOptions = new Array(
            "Xi-an(*)", "Xi-an",
            "Well-being", "Well-being",
            "Baoji", "Baoji",
            "Hanzhong", "Hanzhong",
            "Weinan", "Weinan",
            "Shangzhou", "Shangzhou",
            "Suide", "Suide",
            "Tongchuan", "Tongchuan",
            "Xianyang", "Xianyang",
            "Yan-an", "Yan-an",
            "Yulin", "Yulin");
            break;
        case "Sichuan" :
            var cityOptions = new Array(
            "Chengdu(*)", "Chengdu",
            "Pakistan", "Pakistan",
            "Florida", "Florida",
            "Deyang", "Deyang",
            "Dujiangyan", "Dujiangyan",
            "Emei Mountain", "Emei Mountain",
            "Fulin", "Fulin",
            "Guang", "Guang",
            "Guangyuan", "Guangyuan",
            "Jiuzhaigou", "Jiuzhaigou",
            "Kangding", "Kangding",
            "Mountain", "Mountain",
            "Luzhou", "Luzhou",
            "Malcolm", "Malcolm",
            "Mianyang", "Mianyang",
            "Meishan", "Meishan",
            "Nanchong", "Nanchong",
            "Neijiang", "Neijiang",
            "Panzhihua", "Panzhihua",
            "Suining", "Suining",
            "Wenchuan", "Wenchuan",
            "Xichang", "Xichang",
            "Ya", "Ya",
            "Yibin", "Yibin",
            "Zigong", "Zigong",
            "Ziyang", "Ziyang");
            break;
        case "Taiwan" :
            var cityOptions = new Array(
            "Taipei(*)", "Taipei",
            "Keelung", "Keelung",
            "Tainan", "Tainan",
            "Taichung", "Taichung",
            "Kaohsiung", "Kaohsiung",
            "Pingtung", "Pingtung",
            "Nantou", "Nantou County",
            "Yunlin County", "Yunlin County",
            "Hsinchu", "Hsinchu",
            "Changhua County", "Changhua County",
            "Miaoli County", "Miaoli County",
            "Chiayi", "Chiayi",
            "Hualien", "Hualien",
            "Taoyuan", "Taoyuan",
            "Ilan", "Ilan",
            "Taitung", "Taitung",
            "Golden Gate", "Golden Gate",
            "Matsu", "Matsu",
            "Penghu", "Penghu",
            "Other", "Other");
            break;
        case "Tianjin" :
            var cityOptions = new Array(
            "Tianjin", "Tianjin",
            "Peace", "Peace",
            "Toray", "Toray",
            "Dong", "Dong",
            "West Green", "West Green",
            "Hexi", "Hexi",
            "Jinnan", "Jinnan",
            "Nankai", "Nankai",
            "North Star", "North Star",
            "Hebei", "Hebei",
            "Wuqing", "Wuqing",
            "Red Jiao", "Red Jiao",
            "Tanggu", "Tanggu",
            "Hangu", "Hangu",
            "Port", "Port",
            "Ninghe", "Ninghe",
            "Tranquility", "Tranquility",
            "Baodi", "Baodi",
            "Jixian", "Jixian" );
            break;
        case "Xinjiang" :
            var cityOptions = new Array(
            "Urumqi(*)", "Urumqi",
            "Aksu", "Aksu",
            "Altay", "Altay",
            "Atushi", "Atushi",
            "Bole", "Bole",
            "Changji", "Changji",
            "Dongshan", "Dongshan",
            "Hami", "Hami",
            "Wada", "Wada",
            "Kashgar", "Kashgar",
            "Karamay", "Karamay",
            "Kuqa", "Kuqa",
            "Korla", "Korla",
            "Kuitun", "Kuitun",
            "Shihezi", "Shihezi",
            "Tacheng", "Tacheng",
            "Turpan", "Turpan",
            "Yining", "Yining");
            break;
        case "Tibet" :
            var cityOptions = new Array(
            "Lhasa(*)", "Lhasa",
            "Ali", "Ali",
            "Qamdo", "Qamdo",
            "Nyingchi", "Nyingchi",
            "Nagqu", "Nagqu",
            "Shigatse", "Shigatse",
            "Nan", "Nan");
            break;
        case "Yunnan" :
            var cityOptions = new Array(
            "Kunming(*)", "Kunming",
            "Dali", "Dali",
            "Baoshan", "Baoshan",
            "Chuxiong", "Chuxiong",
            "Dali", "Dali",
            "Dongchuan", "Dongchuan",
            "Old", "Old",
            "Jinghong", "Jinghong",
            "Kaiyuan", "Kaiyuan",
            "Working hard", "Working hard",
            "Lijiang", "Lijiang",
            "Six Gallery", "Six Gallery",
            "Luxi", "Luxi",
            "Qujing", "Qujing",
            "Simao", "Simao",
            "Mountain", "Mountain",
            "Xishuangbanna", "Xishuangbanna",
            "Yuxi", "Yuxi",
            "Zhongdian", "Zhongdian",
            "Zhaotong", "Zhaotong");
            break;
        case "Zhejiang" :
            var cityOptions = new Array(
            "Hangzhou(*)", "Hangzhou",
            "Angie", "Angie",
            "Cixi", "Cixi",
            "Ding Hai", "Ding Hai",
            "Fenghua", "Fenghua",
            "Salt", "Salt",
            "Huangyan", "Huangyan",
            "Huzhou", "Huzhou",
            "Jiaxing", "Jiaxing",
            "Jinhua", "Jinhua",
            "Linan", "Linan",
            "Coastal", "Coastal",
            "Lishui", "Lishui",
            "Ningbo", "Ningbo",
            "Ou Hai", "Ou Hai",
            "Pinghu", "Pinghu",
            "Thousand Island Lake", "Thousand Island Lake",
            "Quzhou", "Quzhou",
            "The Kingdom country", "The Kingdom country",
            "Ryan", "Ryan",
            "Shaoxing", "Shaoxing",
            "Shengzhou", "Shengzhou",
            "Taizhou", "Taizhou",
            "Wenling", "Wenling",
            "Wenzhou", "Wenzhou",
		"Yuyao", "Yuyao",
		"Zhoushan", "Zhoushan");
            break;
        case "Зарубежные страны" :
            var cityOptions = new Array(
            "Соединенные Штаты", "United States",
            "Великобритания", "United Kingdom", 
            "Франция", "France", 
            "Швейцария", "Switzerland", 
            "Австранлия", "Australia", 
            "Новая Зеландия", "New Zealand", 
            "Канада", "Canada", 
            "Австрия", "Austria", 
            "Южная Корея", "South Korea", 
            "Япония", "Japan", 
            "Германия", "Germany", 
	    "Италия", "Italy", 
	    "Испания", "Spain", 
	    "Россия", "Russia", 
	    "Таиланд", "Thailand", 
	    "Индия", "India", 
	    "Нидерланды", "Netherland", 
	    "Сингапур", "Singapore",
            "Европа", "Europe",
            "Северная Америка", "North America",
            "Южная Америка", "South America",
            "Азия", "Asia",
            "Африка", "Africa",
            "Океания", "Oceania");
            break;
        default:
            var cityOptions = new Array(l_select_city, "");
            break;
    }
	
	var cityObject = document.getElementById(cityid);
	cityObject.options.length = 0;
	cityObject.options[0] = new Option(l_select_city, "");
	var j = 0;
	for(var i = 0; i < cityOptions.length/2; i++) {
		j = i + 1;
	    cityObject.options[j] = new Option(cityOptions[i*2],cityOptions[i*2+1]);
	}
}

function initprovcity(provinceid, province) {
	var provObject = document.getElementById(provinceid);
    for(var i = 0; i < provObject.options.length; i++) {
        if (provObject.options[i].value == province) {
        	provObject.selectedIndex = i;
			break;
        }
    }
    //setcity(provinceid, cityid);
}

function showprovince(provinceid, cityid, province, boxid) {
	var provinces = new Array(
		"Зарубежные страны",
		"Beijing",
		"Shanghai",
		"Chongqing",
		"Anhui",
		"Fujian",
		"Gansu",
		"Guangdong",
		"Guangxi",
		"Guizhou",
		"Hainan",
		"Hebei",
		"Heilongjiang",
		"Henan",
		"Hong Kong",
		"Hubei",
		"Hunan",
		"Jiangsu",
		"Jiangxi",
		"Jilin",
		"Liaoning",
		"Macao",
		"Inner Mongolia",
		"Ningxia",
		"Qinghai",
		"Shandong",
		"Shanxi",
		"Shaanxi",
		"Sichuan",
		"Taiwan",
		"Tianjin",
		"Xinjiang",
		"Tibet",
		"Yunnan",
		"Zhejiang"
	);
	
	var selObj = document.createElement("select");
	selObj.name = provinceid;
	selObj.id = provinceid;
	selObj.onchange = function() {
		setcity(provinceid, cityid);
	};
	$(boxid).appendChild(selObj);
	
	selObj.options[0] = new Option(l_select_region, "");
	var j = 0;
	for(var i = 0; i < provinces.length; i++) {
		j = i + 1;
		selObj.options[j] = new Option(provinces[i], provinces[i]);
	}
	
	initprovcity(provinceid, province);

}

function showcity(cityid, city, provinceid, boxid) {
	if(isUndefined(provinceid)) provinceid = '';
	
	var selObj = document.createElement("select");
	selObj.name = cityid;
	selObj.id = cityid;
	$(boxid).appendChild(selObj);
	if(city == "") {
		selObj.options[0] = new Option(l_select_city, "");
	} else {
		selObj.options[0] = new Option(city, city);
	}

	if(provinceid != '') {
		setcity(provinceid, cityid);
		initprovcity(cityid, city);
	}
}
