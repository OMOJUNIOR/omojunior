using System.Web.Script.Serialization;
// Başarılı ödeme sonrası Sanal Pos tarafından gönderilen parametreleri alıyoruz.
// "datas" adlı session değişkenini alır ve onu bir List<object> türüne dönüştürür.
var datas = (List<object>)Session["datas"];

var serializer = new JavaScriptSerializer();

// JavaScriptSerializer kullanarak "datas" nesnesini bir JSON dizgisine dönüştürür.

var datasJson = serializer.Serialize(datas);

//Ödeme verilerini depolamak için yeni bir Dictionary nesnesi oluşturulur.
var sipayData = new Dictionary<string, string>();

if (Request.QueryString != null)
{
    sipayData.Add("status_code", Request.QueryString["status_code"]);
    sipayData.Add("payment_status", Request.QueryString["status_description"]);
    sipayData.Add("invoice_id", Request.QueryString["invoice_id"]);
}
var sipayDataJson = serializer.Serialize(sipayData);





// Başarızız ödeme ise Sanal Postan tarafından gönderilen parametreleri alıyoruz.
// "datas" adlı session değişkenini alır ve onu bir List<object> türüne dönüştürür.
var datas = (List<object>)Session["datas"];

var serializer = new JavaScriptSerializer();
var datasJson = serializer.Serialize(datas);

var odemeHata = false;
if (Request.QueryString != null && Request.QueryString["sipay_status"] == "0")
{
    odemeHata = true;
}

var adresIl = Session["adresIl"].ToString();
var adresIlce = Session["adresIlce"].ToString();
