import 'dart:convert';
import 'package:http/http.dart' as http;
import 'Employee.dart';

class Services {
  static const ROOT = 'http://localhost/testsql/hello_world.php';
  static const CREATE_TABLE_ACTION = 'CREATE_TABLE';
  static const _GET_ALL_ACTION = 'GET_ALL';
  static const _ADD_EMP_ACTION = 'ADD_EMP';
  static const _UPDATE_EMP_ACTION = 'UPDATE_EMP';
  static const _DELETE_EMP_ACTION = 'DELETE_EMP';

  static Future<String> createTable() async {
    try {
      var map = Map<String, dynamic>();
      map['action'] = CREATE_TABLE_ACTION;
      final response = await http.post(ROOT, body: map);
      print('Create Table Response: ${response.body}');
      return response.body;
    } catch (e) {
      return "error";
    }}
    static Future<List<Employee>> getEmployees() async{
    try {
      var map = Map<String, dynamic>();
    map['action'] = _GET_ALL_ACTION;
    final response = await http.post(ROOT, body: map);
    print('Create Table Response: ${response.body}');
    if( 200== response.statusCode) {
      List<Employee> List = parseResponse(response.body);
return List;
    } else{ return List<Employee>()};
    }
    catch (e) {
      return List<Employee> ();

    }
    }
    static List<Employee> parseResponse (String responseBody) {
      final parsed = json.decode(responseBody).cast<Map<String, dynamic>>();
      return parsed.map<Employee>((json) => Employee.fromJson(json)).toList();
    }
static Future<String> 


















    }

}
