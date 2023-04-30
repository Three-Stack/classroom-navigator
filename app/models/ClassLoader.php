<?php
/**
 * Loads classes for a semester
 * This is not public-facing so it can't be run from a controller.
 */

require_once(__DIR__ . "/DBConnection.php");

class ClassLoader {
    // Semesters are defined by number with no discernible pattern... these will have to be updated over time
    const SPRING_2023 = 2233;
    const SUMMER_2023 = 2235;
    const FALL_2023 = 2237;
    const WINTER_2024 = 2241;
    const SPRING_2024 = 2243;

    /**
     * Loads the classes for a semester
     * Term needs to be a string, one of the consts defined above
     */
    public static function load($term) {
        $term = 'self::' . strtoupper($term);
        if(defined($term)) {
            $term = constant($term);
        }
        else {
            echo "ERROR: Term '{$term}' not recognized as a valid semester.\n";
            echo "Examples of valid terms: spring_2023, summer_2023, fall_2024, winter_2024\n";
            return;
        }

        self::setUp();
        $db = DBConnection::db();

        // Send a CURL request
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://schedule.cpp.edu/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=K9384jq46p9aU%2FOf66rC%2BNTJX7RYFKbly3Ve2TUAGpAaAdLmN6MWIvxGCd9sLfrlKk%2BmPDi3FjgoKSc6XwPy2cmhq1mGxZXZ2qTsLuVoBxu2g0YFnVfp3zjDC637G4ErmcLB646qtIg8BFobP5Z97bDfubVDuzA1XhLk2wTX8HEfltwlV7Sfn2cf3MISq1OO%2BpDsZohUj5V4B3WXmvXrsu6DlFCOTkvm9dAn7hmYHwesTJvC6m32uBc8gzkSkT6wL2Ex8DZlxztcrsUyuvhyS8yTSeZZ8J4LjcJURWVq1TXT1OF%2BuFi9mW2VLuB6TYom2A8F0%2BKNYli0jgWxwGiyv8%2BAyqe%2BZAmCbT6v2DG0lUgij9%2BqU%2B98OPaY21q1izsAg2BmsOD7spJyvSYMMNitTkr5kQsQyFfpwgMw5%2FML2QuXHgzKEFymIb9wpQgnQXEcx3D22HGrzn0xEbN2auO%2BNDg2zfBZja5Bnk%2BjJeEH4ZPNt959FCYAIJnwMKYbmHEyq0QQ6cZ5Is1iQ0h%2FpWmZ8i1UUmX2%2FMTz%2Fw3gggsg%2BZNSb9ZXxF%2F68et%2BPBI2lTPVpEWvTmprOEUbYFKKdzJvufnsdUbol9ba3J5xDoB6OQfWhIDHCQuxT7eGSB4qHsHO4XeydI68kpPAcfy8lkEk2ojJGAWn5JIQAa%2FZNP7VqBLc8IB%2BcsJHayCy%2BzPzy25%2FYYnmUc%2F58MR4uaC0YPyDYcHfb1iydQncbrM7n3tAewjf6f86eQ4BUX%2BMQsVBwppz7izZNxQI9BgJHuaU3bDVSxJ195WHJ%2F69gdxyfSagQfPjnLQc2H3%2BbfTOVMFekcohNz4N8VWJFGR68bN8vT%2B9q%2BrQJzGSxia7ZtQRBPLHrfu0WJKEneONXGIpt7X1HkY2yzY0uB9bpsD0lbI34bzIENGe%2FCXsA2e9OlaLtKw1UIufypsAedv54jniy2P0xwXwqvM0NuTQqRn5DqQU23o0CnVcMDGSNBRCIHJwy2jXws5TcWftk2kTB0r%2B4pi091a6c8NanzBkUZ3h8JynJBsyZIu%2FhpVmBLs2JuhG%2FeHarX58uHa7cf7%2BPxBZUQmH%2BrLw%2BJliz5EHMyyveONJH6ANTyN1D41Ciah%2Fa8%2B81gefYbNpGxpdTZWZ8D3hltnyfCG81n9%2BkOHQ77DTfzKZgVhAs7D1inX9KoD6vw2ghoPSJ%2FEWipXiGMvw96IeYtBBg%2BDUPjoZyu%2Fly3QxpCnu7TmSfAmi8dEYxjGJpAVGYLdsc3myTKpi9CLOkkJoCSmkpFArR9HSLDWGV%2FPBMURBXqRfYUIyjm7jPos6uZn9dfpacmeDtEn%2F2ruqxaO1JzC2piLyySKmarw5Jd8d30rPEY0f4zpGXA%2FQi16IAZZXRklDTQaSfO%2BZRtsBJsdagBtXHdzUDjRHzRvei%2BfCuthcR2qARv1Nzf6bcihNULiLlOnx%2B3Ec8xLzd7daFaVgfbR2KsNcIlzwysvcf3oejTKnnBcLx8luNZW0r%2F8LBTr0YpnejVthpfG9dk0D5U3yEvkLXQF4FOcGtn0FELzupNvrArlWohWYymHHV9tQM4p1VLuq3Ndz9EblC4hNAH6cCIL90egnLM9Z8Ph676Ap11u%2Fo2Z81XC%2F2bkAZSG2pLG9ocbnLbh58dDNr2zKfZFgNB%2Fd8YTIqAE3AH2WJVUOj5Tpy7rFK6joD%2BdwtIEyr8fMJfGHamp5KdIhifE0pVZz%2Fyy95GmHDJD1ml47aC17bq0FDC%2FKZXeKLemCCfxavEZKI5BNdIu6dFsTvYPwM45%2BNntFxzXxoZrC%2FSD%2B4T4MeOJ1O3rRikKvzA1UZ%2B%2FNK3gxFeSr91SdVClhqrjduEb2XY3lITNLe7I9VjU3nCg0wHPKFMpYEl9mRezpmCR%2BpYWGRplD8rPEXMQ73b0BP0%2FQx9iu1wyGyxP9M2WHddmGUdbSNEaMzcpQ4R2XstdLOVASF6i8jwWPn95hFdCTJQEO7UnuYjyamJNk%2BzFZ0GKXjSgfsnTwL7RG9yrOhbHUEiBaVdeu2dpdKRD8P9Fo35OQbPglgYdeZ7S%2FZXX4xmVTRxEgdu%2F%2FXUqMhwvix4dkDiuwJnq%2FIvGW6uwjrUd9G4hQHGBjCpev2DdwmnBwbZYbd2CtH18fd2veWmcAa8UafYuoT3h1GzpDxc7N5u%2FqWZpsUf4k7lHgEHRopJJdJ48sAOqaBljI%2F8xbhyp89akhQzWZAHZaOZLcZtxAaD0J6nUGryyh%2FAM0SjP5kDLD83IVShiR%2BtfU1vq6kV22%2FK53GRKcvxKjuMbF2PY%2BfiDGaupurWAUwiqFu38pr8JawmxgPqJNQ%2F2B7LsnPd%2FzIIXFVBYo4fgNy7O77ytdJb%2FkpOcnsapJE%2Ba1suqAzxNiyxRha%2FhpK4SM7KVIYI0HLBJFfDTJZFGJZ8T6jRo9BbapkS8DKB4m0rOnle507zmKbtJSaQAd0xOCjSx89mRAqigIdDXcK%2Bm3VZa91tC2RjGaSepVnVmThJ17YkJfMERwoE8btNFUSkybR%2BzP65dDAviR6tHIJo%2FO0PcfpLO7mEqTFl192GmVtQeQ6ajtlLJOrRsS6EYmLM6gb4ds2qsx9TsPi54ay1im3QQWv7f0mBYzQ6mqg2jt5EA1GETPOPkJG2y4srxllxubbgSmqEYFEiCC%2B38CFssX07HDTwoi%2BDZwFzA0WwwoKUhxyujz2%2BecOpuPaZ0bs6x%2Bur4DI3bzM3yfVjt5rql1iieN0TbQ%2B9%2FCUHGBGCjx%2F6pemWtAP9tKzeZwaXv%2FB%2FvYPhdHElpkgFrHz%2BhpcUygbqb7GL8eERQ0wwxw7SyPTMJwyMJfmzjsZ2rwwjuRNKewyD%2Bl8jIaT3DEEYLq03z95sdOD5ZjuQthpSsknLYQCj0Qojtk5wMStVgVvwdnKaZRcKWI9B3zDnsmEAfWrH0leCGuAQstFdt8in0sJH6DbDaBoDCFTmkBvO%2FDetiPCzKR3Hvj0uOsIW4sF4NTvilFTJ0L7d%2BELMGTAMgvWozCPZztUaUBiuaF%2FD7uFYR5QqoIMi%2BD79tuo29nKkFLQhGtfQ2qQY%2FeDYOluOjfv1CZdIES0fBKb1aHu5Qp8RoTAU3PcjK3%2FG8%2Bk1%2BpDZaXm%2BhoIOVIwi8RIyqLQovBznuujMIAQGOiekoZstbLtKUDJF1Ji9IdTVt0A7A53UOq6b9ZyU3%2Fv7%2BYiDRT9v0DnTFS2MKC33l64fA%2F49J%2B3SbAsCJTd%2FPVNLYxUqFLxekXpUZDS6oqhitfvlXrtBZKJRgDng7X94Brr0LYLg6kuod5fnyDuUgr%2BfFcjkRvcrsMyRYtXa%2FIpQrcWgv%2Bg4Ce54JD7pZ%2Fk9BbeTxoE9HtvqCe4fSReMpbFQJrTSNR0NTd2LlJBSQasLPPRsaDvzOwE%2F9ATnerg7zhQvKUPeTSjbmR0z8RFnrG9xby0YBXiGRgnr3SBs%2FuML6F5DQhIhq7kygs8AkjtzYPJNy2NmOiSpXmX3Idw22ZllaKsfTz8iTA0TZtLy1riyop2WRpgLsPY9ZOgqXS3tOAESZvMRD5Al9%2BSIg4dahrO5KFVWRPx534Q19Z%2BSBo2HYMtpdJpnKVcsk8jjfVlCftmMFLsjYwllDoAFxYvx5meABxb0Gs%2Bycbn9bUvXLQgw%2Fn7V1og1RfSbEPs%2FHfpqNwO7zXewQITGhiF45%2BoGAxVMgXN7YbJqTVuFTpVmsr1PR99teJjyQZETCFEGDSxa6%2FmOIJ4BLeDPc8s9pkPLkmGl4eoOvKDL3r80OccyASoQb7X1PRdoj4lbASIPBfcdgGAygyQY%2BRPCnckkRCsK1VMo8kyFn3QPNkoMeYoTHLgS%2BJMa5VJpndnn3QumBBoU9SKblQO9ozjPqdLxo1Z2ImsCi6QXYsmN57SX471%2Ba66PJQcYgd31bU9oJat23PX5NXvVTeZ%2BMwLHJARTp8PKxtChBx%2FT48Akv5%2FCcbF4u66kvuMvdbhqZC8cUJ4gBRStQeFdikTfNv1A3BSooyHc0BIVnKRZrGP82pOgpR9NNrpn5sooTNaNChx%2BWVYFvv86FdAlCrutQfpR5U%2BfTUCarYRbOKg28USa00QF2UGzZIggbRRyW3KtpWHT2jZTEWqM4iAYckdQnEreeP31Ogsf3GmAiWtOXCikGaofxPvYkIoX0e5uFrliDVV9r3yzF2BA2yiCN6qNkAmaZxujq%2FETuKDSBHvF6nG1HHMEY5CVaeVj1KzSz18yjo6cDWomqb4ZLCg9d9zWMEh2wLgZ3LZB5fGv8CIHcJW%2FQ6yIsxTKldkHhdqeNdvXHl8ZJ9pimpwJYBZmGxjmuh%2Fm7ZIMUKtQgzSVXiSE%2F0IJM3c82X68ic1Qt%2BP3zuJMgd9%2BiUQ1FiJDNMqXfgQtVsvjPVrTc44QhGslPoAkCyoQFN646O%2FhYzlLm9O11ymw5rEQDvJ1%2BFwg4h0AGqdbD4qvPd6eIQKgY%2FMyTKWtd4Pkh6XqjjGAxV5S53O4Wdd842JIH5oZLtJ2t7eJxszRnJkeshIOr1t%2BHB6SyWE%2BGbuj3T4gj%2FitEScfrLwK2Ar%2F4y6UIcOWMpw29WBk2FFZEvmjCTuCEfTi0SzgF06iKph4vHpQTOM4jsmIvNmgxuee1hwRycOHY0JDJaWi4G%2Fm%2BkRgUIA%2FC8phI5tJOlyqyYuY0SynUZc3wJL%2BZ3mBxvJBra61yHGc40AEkngaVYRYFAiYd2s2h2yvdoV%2FyvPrIsBJa4yZqkuZVUxrV8GjajWOegBH8IlnNP0n9%2F0RgYQguTTujcevKIl2nLwaxqw3Z%2Bog2n7sx5SqWVgYf7Bo3%2FmZ55HXlRhGMJHewfSKe7wCEV7DTLxqJCn3zC7hhAqeLoby0mOxSEG0vmhPThpl8jw38IAFCLXxeiYS0EGpUluT9eTAaCEcBwg3aRPQrNcBfr%2FG2wAGd9a7Qb5egoWD6%2FYK1SSV7jK81kecF4gbcwwHLNj26uoLGoDfOSFnxF3tTYpSTXwzYwv2KtLT74kknFk5rSqxb4pV8h3AjhimPHe7eLvpJJIERViMCE1Klw38WgFiC1zpwcJTo%2FnhktEKtfTVsqaOCmsL%2F%2FXEvFqF5ye2G6F1eHh8kQGeNCa7SFb%2FwFkson1JZCDar0Qhze25g5IFYDlRKudodcvexbDgOe3zsyq8dAD4M1JFJLiYjUHwv2W7MD%2BkU13egWm1YuAVsBzqBGV9XmdEa9k4412LJ4UK%2B3sbEQmr33ces1zO2A8Bt3%2BX7nQUv%2Bcn9te2kKG9N6E6s5WeWi01vz2Lj7L7gBe1jVidtlWk1aFFUkQa7IeKPQUWxBGuL40ZGeuWocCtfL07Kf9EaoXeJhR%2BvbmQ%3D%3D&__VIEWSTATEGENERATOR=90059987&__VIEWSTATEENCRYPTED=&__EVENTVALIDATION=Ig7G6on5HiflSKVxrSD48nMjN7v5F%2Fq4YEkPP1O51rAI%2BbHSwtxkZdh3sm5n8GdnoIUSdn%2BvAh94u%2B9b2PdTITcW2AZNG3gw7l%2FB5sewZ4JiYSdXQMy7DxX3h7WM%2Ftjk2PpAW1aFSe4xmkbFwiehzZini9YFUIA2W0RAvv1H2q2t%2FuGwlEu8%2B8fmkpZh4XdO4FfXt%2BUzWXkl0IZYgj5nlYQ9uR%2Fgq%2FC54QOZehVA5ZS6wxAN1SI%2B0MjTKjIjCD10MywKaisVoPJJ709JDFfODZfw6cMZ0h0mqHrRu4fZn5YzlJei8qYda7ahimwROoqm5%2B%2FsWtwmW3wBFEh6cuSOAXYyfNDXtyTETdVXln5yAITUp5xRodv76vp9CRFKsWf%2Bt3cjIFW55%2F6D81R9At%2FIib4%2B1NPO5NWO5Jf4XJACTe0yXDBubaIs7scIgRhVK0kM1Q%2FYZnH1UG3IKv8CpH47G9RMe2Mdwm5vgp%2F9hb23eGct831Ja2xQP8SUs9Ul1HQx3Ab6QqQwB7bBY3EBzLbclG0MlXtK3Rj65l3aPaXRZVyt1N40FkgsOv1RyQGKq%2BEDD8RlOdG%2BKQ2OIkao20GyTFF6LX1QuE27uOXsM2zDpB2%2FkRfnbcdSU9US%2BcYikInhCS2pJZR2Hljvkj8KiP8%2BfT25hcIjPhnkIDVgi5AI10l%2B1c213Jk5QoSflVbsDIkjfIAyDDo4iWXKJrRA9Rg%2BVEnhCb2WJ047QO95GYalh17EjqAdCokQdsNzeFUKgyTBiAj2zd95ILfaQbtUVheIvuHQSDDbw3VgbHUfHNzQu7eps0PGfJndTjoiPq3s4nWVp52DHnbRcBqNtCj6%2FCbUg%2BC5Z%2Ff3N%2F74uhoBbHlaFfo3nHpCaV2tWLvX9IorcZ3D4ac1slQweDAwWnQldBdiveE72Xvhn%2FcuDxVYDkKnhA1Vju3eMvOF7Dma00adv50pcIhgutB1zGe6rDCrDSnPzkruULqdVVFrBcPY2YmJ6kizhTgROCvK9Y98tVZQPbJ8Y938%2F3%2FE8WmqlKTrDoYS8XLPZdi9ahV50og%2BCsqO9TpMVZFpHUgpRbRX7rtmIjqJyyg7pO9PONvjwrcEa%2Fv63N%2BWqQaIP4Fv7MsthWR0k7wlvUsvwtrAEdKUcomL8%2F4X2kSSFClSzf9L81eMCBzCsk2xarEVpupkRt%2FomtZO7IbCSaK5SxA%2FGSPraUGtjliOMhHiTGjo7i1Hku%2BfZmw0epie%2FHhY07oEQlUnYz8P4S4ulpbfwpgvhRfU%2FDMSmfJQoxISr%2BZmVw9N%2BWxjk1UGq3zzlX%2BfHEgT17JjFHEA0zywPX5sIXS2apd3A%2BrO%2BiMciGMIjk%2BOSidECObdYBoAGWs464Pzwy6kIy8URsIto3IUpGPQuUEMi8rvNJuHafRrsDFFeA231Apd%2F5Vxq0ZRYTrf7V63uXQbZQjVMzn7s10m4m4SdijcnbSVjI59%2F9Zc1USuG7VW2RaVCwd7MYhGKgTcWNfPIWMh2mhCzN8DHDRxskITGYgNQwVQ6pdIVDGVt4ZUQUWKqpMnU2sA%2FtKsRCQKYNzwbjFXtgB0mmc6Mo2HE0yjHL0jVuRMnO1Ee7ZUaj126Q6QGhpOYtUSRz8BsKHdCpd74EDb%2FG%2BhN8iyJtyvHR7qfKvCN0GnmrL8BJIeQsIeY5UQrDXjzX%2B1ogjcJPBY%2BHzytt3AXntNHNH0eWzoS9vcoS6AJasnRZFC%2FYffpmOB2%2FGDeiWg02HpGniokCPi65dcoAvenHEclTIgedCiCHaH5YEqf1kJAc7OjU45ac2sRZSM0A6OCZHHou8tqhNNmrz%2BfmUTMwIdbDmXwktozxG%2BTTClysbjSBShWT6CYFIEsEPbIqzuRA6lXnWHVFNIZZh6DF%2FjpBLRN%2Fn1k4NUYfpLVLkpFTjMmFTKezjYGQ6GI6U5L%2F7lyrayjkHDdnvmICS6tRev%2FOO%2B%2BSvwichnBx%2F0%2FXadwChIPUlPj90dAshBBITrSFAj2orfM%2FKRWPn1rHhfVM%2Ba38RnfeAb%2Bc9c1vqsE7XGEVWCZPMZfHSDgSrduWfJ6c1EuEq5MRHlMyfLhdczccjay1iA4KxZtd6%2FZktBToMx4ZoMiDdOkHrBT13D8QRoMz%2FXksLLFIL8vApk5Q5YNsfOc5bZhlN9fTIfOLIUP1OscWYK7fgN734obb9s24TH2HxaljOg%2BHlWwvd%2FstkxodbAS24UZ4Q0F%2FTTZbxnFlXszH2QB9qG9khAPEGjYDZjptsWvEkoV%2Bmdw6epST3RfJFnlFVwmJuu%2FEnTbqpGIYoD9u763OAXOJwbuhrDmvQgCem9NbA07Byqeif6eAMmeOpV2aRewm7gPB7d8T67bHjUmrejjUiFH5MMaS0fS7bKwkCMMR7IYmmgvsrBQW1k5kFeaxnqxRlKuR0xnB5lqBw3R4ciy7CIjy%2BeXq6ot7Q60qfPBK0PMqVcjuVwSCurQIXnojCXguTNVmlsZpZJ7i%2FecrsGB7Q%2FB8DeOShi%2FVdmcPyURT7%2BE5Y%2F0uvorapFNY38lNiV2DBwtuqpemh0Gj1wWUF1Y6LsSmH5DatmizDMQLvFC8gt1F%2ByKuPHOq0PFK%2BzGDEDi2bUfDM1PhCuAiO57Dz%2BigT24scYNz7xW8Uwv1fFtEir9HXcxs3DpiWv9J2i2Uufs1QsKAaEmWD4%2BVX3VNzXpymLO064a6egYK3MedqLhaI1qhnQ2rGrhOwLHVw2hDDFJE%2BPFkiutbdZCvquL3tlyZbtJ0GdPIHoWuHJML1EDRuWlf2lS4HWIxW9OwuoYICf8u0jboWmmhZvrzRRd1UkA3X9Bxcgwi%2B3O4g6ThXZ1t7GqEtCxlLMEkZD%2F8PFOwDyLw70Bx6EjYsKuupn%2Ft6kKLZMTJXD1GeClPaOYtz%2FzlFhtDikC%2FJgMdtDY1bC1bC6j%2F3DlEjLu6c2Ci9HtvKEumwjS5xNeXavrKO9656aeGLUUeUXNr29WQOVZzed2fsKVCiKC9GLQbpbXfe31HkEgpei92GE4mxGS4z5OT3zP%2BqZ7CV%2BrLN3Ek5QMYOZAlz45XrJww9ZAcHX8lvlZxns1Wg5ckGZE9qufyNHikj6%2FdGfGbpqI6GzT8dS8P0dF2gTW1yLWNlGx2VLPNBC%2Bkonrn8xZQ0Ir0buzAwv6yTXFN%2BfAtjBHL8L%2B9zzXBiv1VoRJzGGo8GrqryFUbdSytgliHjpZuaFkQZkT2JsAFn3cYJ2HIB2q0XtJW3UI91Fbyp5hxm%2F5ROnuLn2x15mx9DXy6GjbsXUzXIB3Ve0i%2B1bNj2Mvum1YABSOvVgckzvMDHLE%2FhcTgUDCrB4HWagm8CR2eHp6P36oFb%2FM3QiSRFi2FL4n9sY7VcN%2FlRtsfvSKmQXugC9GobNWCDipxCllKYqtvZYOCAfLZT7hPAkXh7pcRphGO1czvVdPFyX1OjPvN56AhVtKyZEju1Md1JZs6SBU2REx9k4jaIDUh3YpEU8G%2BCMsJ12y5ok0yF7oeUMTuydS4c8RSw0ea7uum%2FZNNo1oDKuax1ZBVVHPIbDD8XBS%2FyqPzmILmQfkrhi0h0hIFmXQoD6%2BmLxFh6JEv8k6J2pU0O68Kbz14XyRabX5Vq86HK61fQYH8JkWVFoTfnvZVjc1NamjQxC%2B2NUS2J8rZvNeV1OctY4v193XE3gAx8o764VPojWS4ojQZPpDIe8EuAiBia3bCwM%2Fuaq3zuqiwNj9z9TuEebUbsDd3Exbt%2FGoBpMcPXZpbz10SmA3Sf9yCUosi14L%2Bw8W9ecKC5fPOu15qGi9dJR4jT0kFSZl6U4vMEbYW%2Beg1EnBsGHYlFCwHAqBrcXEXmkmWSuijGyBlROn7qkxPbUeyRNsGBYhcxIOjA1QTeKezfJwkSmvQZBKWRIqaIWyG%2BOV8Cy3EFrzBx%2ByuuA732BXtJNcZhXBg%2Fe1cJ7yCVks0HoTwzZXf5VoIPiWVObinwgtHWwpp6yDwJ4rAdm7NsLLHaDm1rxHXr66P2VzAoebDFW5eSElYGAaIwjkBLZa8LP2vxXtIe%2B0n0DvbAKHJiFfkQ6T74YGIGTqfP7uh4neSiGgURaieq4pD38bGs2d7LPFQ7YLxF1orNnb8KY1ETTCv50XZLbhBkFh5isX4%2BM756%2FzpqsJ8iUZ%2BOR%2FvheZF6wETvs&ctl00%24ContentPlaceHolder1%24TermDDL={$term}&ctl00%24ContentPlaceHolder1%24ClassSubject=&ctl00%24ContentPlaceHolder1%24CatalogNumber=&ctl00%24ContentPlaceHolder1%24Description=&ctl00%24ContentPlaceHolder1%24CourseComponentDDL=Any+Component&ctl00%24ContentPlaceHolder1%24CourseAttributeDDL=Any+Attribute&ctl00%24ContentPlaceHolder1%24CourseCareerDDL=Any+Career&ctl00%24ContentPlaceHolder1%24InstModesDDL=Any+Mode&ctl00%24ContentPlaceHolder1%24SessionDDL=Any+Session&ctl00%24ContentPlaceHolder1%24ClassDays%240=on&ctl00%24ContentPlaceHolder1%24ClassDays%241=on&ctl00%24ContentPlaceHolder1%24ClassDays%242=on&ctl00%24ContentPlaceHolder1%24ClassDays%243=on&ctl00%24ContentPlaceHolder1%24ClassDays%244=on&ctl00%24ContentPlaceHolder1%24ClassDays%245=on&ctl00%24ContentPlaceHolder1%24ClassDays%246=on&ctl00%24ContentPlaceHolder1%24ClassDays%247=on&ctl00%24ContentPlaceHolder1%24StartTime=01%3A00%3A00+AM&ctl00%24ContentPlaceHolder1%24EndTime=11%3A59%3A00+PM&ctl00%24ContentPlaceHolder1%24Instructor=&ctl00%24ContentPlaceHolder1%24SearchButton=Search");
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7';
        $headers[] = 'Accept-Language: en-US,en;q=0.9,ja;q=0.8';
        $headers[] = 'Cache-Control: max-age=0';
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Cookie: ASP.NET_SessionId=pb0m4tt1wt13ufjilxzase0e';
        $headers[] = 'Dnt: 1';
        $headers[] = 'Origin: https://schedule.cpp.edu';
        $headers[] = 'Referer: https://schedule.cpp.edu/';
        $headers[] = 'Sec-Fetch-Dest: document';
        $headers[] = 'Sec-Fetch-Mode: navigate';
        $headers[] = 'Sec-Fetch-Site: same-origin';
        $headers[] = 'Sec-Fetch-User: ?1';
        $headers[] = 'Upgrade-Insecure-Requests: 1';
        $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36';
        $headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"111\", \"Not(A:Brand\";v=\"8\", \"Chromium\";v=\"111\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $res = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        // This cURL request returns a massive CSS file as a string... we need to parse it
        $start = strpos($res, "<ol>"); // The results are stored between in the <ol> </ol> tags
        $end = strpos($res, "</ol>");
        $res = substr($res, $start, $end - $start);
        $res = explode("<span class=\"ClassTitle\" >", $res);
        $res = str_replace(array("\r", "\n"), '', $res);
        

        // Parse the resulting array

        if(!$res) {
            // Something went very wrong
            echo "Unexpected error: no classes loaded\n";
        }

        foreach($res as $r) {
            preg_match_all('/>(.*)</mU', $r, $matches);
            $matches[1] = array_values(array_filter(array_map('trim', $matches[1])));
            if(empty($matches[1])) {
                continue;
            }
            $matches[1] = preg_replace('/^\s+|\s+$|\s+(?=\s)|	|&nbsp;/mU', " ", $matches[1]);
            
            $arr = $matches[1];

            // Classes with a capacity of 0 are filtered out, add them back
            if(@$arr[5] == "Title") {
                array_splice($arr, 5, 0, [0]);
            }
            
            // Some classes have their title split on two lines. Combine them
            if(@$arr[9] == "Units") {
                $arr[7] .= "; {$arr[8]}";
                array_splice($arr, 8, 1);
            }

            // Some classes have 0 units for some reason and get filtered out, add them back
            if(@$arr[9] == "Time") {
                array_splice($arr, 9, 0, [0]);
            }

            // Some classes are online... insert "Online" as the building if there isn't one
            if (@$arr[13] == "Date") {
                array_splice($arr, 13, 0, ["Online"]);
            }

            // Some classes have more than one lecturer. Combine them
            if(@$arr[22] == "Compnt./Mode") {
                $arr[20] .= "; {$arr[21]}";
                array_splice($arr, 21, 1);
            }

            $classID = $arr[0];
            $section = trim(substr($arr[1], strpos($arr[1], 'Section') + 7));
            $classNum = $arr[3];
            $capacity = $arr[5];
            $className = $arr[7];
            $units = $arr[9];
            preg_match('/(\d{1,2}:\d{2} [AP]M)&#8211;(\d{1,2}:\d{2} [AP]M)\s+([A-Z]{1,3})/', $arr[11], $timeDays);
            $startTime = $timeDays[1];
            $endTime = $timeDays[2];
            $days = $timeDays[3];
            $location = $arr[13];
            $dates = explode(' to ', $arr[15]);
            $startDate = $dates[0];
            $endDate = $dates[1];
            $session = $arr[17];
            $instructor = explode(",", $arr[19]);
            if(empty($instructor[1])) {
                $instructor = $instructor[0];
            }
            else {
                $instructor = trim($instructor[1] . ' ' . $instructor[0]);
            }
            $mode = $arr[21];

            // Insert into DB
            $db = DBConnection::db();

            $stmt = $db->prepare("INSERT INTO `classes` (`class_id`, `section`, `class_nbr`, `capacity`, `class_name`, `units`, `start_time`, `end_time`, `days`, `location`, `start_date`, `end_date`, `session`, `instructor`, `mode`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute(array($classID, $section, $classNum, $capacity, $className, $units, $startTime, $endTime, $days, $location, $startDate, $endDate, $session, $instructor, $mode));
        }
        echo "Classes loaded successfully\n";
    }
    
    // Resets the table and sets up for class loading
    private static function setUp() {
        $db = DBConnection::db();

        // Reset the table
        $db->exec("DELETE FROM `classes`");
        $db->exec("ALTER TABLE `classes` AUTO_INCREMENT = 0");   
    }
}