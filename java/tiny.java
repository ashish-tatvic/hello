import java.io.InputStream;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.nio.file.StandardCopyOption;
import javax.xml.bind.DatatypeConverter;

public class Program {
  private static final String API_URL = "https://api.tinypng.com/shrink";

  public static void main(String[] args) throws Exception {
    final String key = "<your api key>";
    final String input = "large-input.png";
    final String output = "tiny-output.png";

    HttpURLConnection connection = (HttpURLConnection) new URL(API_URL).openConnection();
    String auth = DatatypeConverter.printBase64Binary(("api:" + key).getBytes("UTF-8"));
    connection.setRequestProperty("Authorization", "Basic " + auth);
    connection.setDoOutput(true);

    try (OutputStream request = connection.getOutputStream()) {
      Files.copy(Paths.get(input), request);
    }

    if (connection.getResponseCode() == 201) {
      // Compression was successful, retrieve output from Location header.
      final String url = connection.getHeaderFields().get("Location").get(0);
      connection = (HttpURLConnection) new URL(url).openConnection();
      try (InputStream response = connection.getInputStream()) {
        Files.copy(response, Paths.get(output), StandardCopyOption.REPLACE_EXISTING);
      }
    } else {
      // Something went wrong! You can parse the JSON body for details.
      System.out.println("Compression failed.");
    }
  }
}