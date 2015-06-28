#include <iostream>
#include <string>
#include <fstream>
#include <limits>
#include <sstream>
#include <ctime>
using namespace std;

class HomeWork{
	string date_;
	string data_;
	string subject_;
public:
	HomeWork(string date,string data,string subject)
	:date_(date),data_(data),subject_(subject)
	{}
	string get_date(){
		return date_;
	}
	string get_data(){
		return data_;
	}
	string get_subject(){
		return subject_;
	}
	HomeWork& set_date(string date) {
		date_=date;
		return *this;
	}
	HomeWork& set_data(string data) {
		data_=data;
		return *this;
	}
	HomeWork& set_subject(string subject) {
		subject_=subject;
		return *this;
	}
	void make_html(bool charset,const char* input_txt,const char* indexhtml,const char* html2)
	{
		time_t now = time(0);
		char* dt = ctime(&now);
		bool close_td = 0;
		bool we_are_entering_for_first_time_in_while2 = 1;
		int it_is_heading_of_homework = -1;
		string str;
		ofstream my_html;
		ofstream my_second_html;
		ifstream file(input_txt);
		ifstream file2(input_txt);
		my_html.open (indexhtml);
		my_second_html.open (html2);
		int line_counter = 0;
		if (charset == 1)
		{
			my_html << "<html><head><meta content=\"text/html; charset=windows-1251;\" http-equiv=\"content-type\"><title>11b HomeWorks 2014-2015</title><link rel=\"stylesheet\" type=\"text/css\" href=\"HomeWorks.css\"></head><body><table border=\"2\" style=\"border-collapse: collapse\"><img id=\"logo\" src=\"logo.png\" style=\"width:600px; height:60px;\" alt=\"Заглавието трябваше да е тук\" />" << endl;
			my_second_html << "<html><head><meta content=\"text/html; charset=windows-1251;\" http-equiv=\"content-type\"><title>11b HomeWorks 2014-2015</title><link rel=\"stylesheet\" type=\"text/css\" href=\"HomeWorks.css\"></head><body><img id=\"logo\" src=\"logo.png\" style=\"width:600px; height:60px;\" alt=\"Заглавието трябваше да е тук\" />" << endl;
		}
		else
		{
			my_html << "<html><head><meta content=\"text/html; charset=UTF-8;\" http-equiv=\"content-type\"><title>11b HomeWorks 2014-2015</title><link rel=\"stylesheet\" type=\"text/css\" href=\"HomeWorks.css\"></head><body><table border=\"2\" style=\"border-collapse: collapse\"><img id=\"logo\" src=\"logo.png\" style=\"width:600px; height:60px;\" alt=\"Заглавието трябваше да е тук\" />" << endl;
			my_second_html << "<html><head><meta content=\"text/html; charset=UTF-8;\" http-equiv=\"content-type\"><title>11b HomeWorks 2014-2015</title><link rel=\"stylesheet\" type=\"text/css\" href=\"HomeWorks.css\"></head><body><img id=\"logo\" src=\"logo.png\" style=\"width:600px; height:60px;\" alt=\"Заглавието трябваше да е тук\" />" << endl;
		}
		getline(file, str);
		my_html << "<p>" << "Най-съществените задачи - по срок на изпълнение:" << endl;
		getline(file, str);
		my_html << "ПОСЛЕДНО АКТУАЛИЗИРАНЕ - " << dt << "</p>" << endl;
		my_html << "<a id = \"change_layout\" href=\"1.html\">Сменете изгледа на страницата</a>" << endl;
		my_html << "<a id = \"change_layout\" href=\"history.html\">История - изглед 1</a>" << endl;
		my_html << "<a id = \"change_layout\" href=\"history2.html\">История - изглед 2</a>" << endl;
		my_html << "<a id = \"change_layout\" href=\"2.html\">Важни страници</a>" << endl;
		my_html << "<a id = \"change_layout\" href=\"colors/the_colors_from_css.html\">Вижте цветовете използвани на страницата</a>" << endl;

		my_html << "<tr>" << endl;
		my_second_html << "<p>" << "Най-съществените задачи - по срок на изпълнение:" << endl;
		my_second_html << "ПОСЛЕДНО АКТУАЛИЗИРАНЕ - " << dt << "</p>" << endl;
		my_second_html << "<a id = \"change_layout\" href=\"index.html\">Сменете изгледа на страницата</a>" << endl;
		my_second_html << "<a id = \"change_layout\" href=\"history.html\">История - изглед 1</a>" << endl;
		my_second_html << "<a id = \"change_layout\" href=\"history2.html\">История - изглед 2</a>" << endl;
		my_second_html << "<a id = \"change_layout\" href=\"2.html\">Важни страници</a>" << endl;
		my_second_html << "<a id = \"change_layout\" href=\"colors/the_colors_from_css.html\">Вижте цветовете използвани на страницата</a>" << endl;
		while (getline(file, str))
		{
				if (str != "====================")
				{
					if ((str != "") && (str != "end of file")){
						line_counter++;
						if (line_counter % 2 == 0)
						{
							my_second_html << "<p id = \"text-content\">" << str << "</p>" << endl;
						}
						else
						{
							my_second_html << "<p id = \"text-content-heading\">" << str << "</p>" << endl;
						}
					}
				}
				else{
					getline(file, str);
					my_second_html << "<p id = \"text-date\">" << str << "</p>" << endl;
					my_html << "<th>" << str << "</th>" << endl << endl;
					getline(file, str);
					getline(file, str);
					close_td = 1;
				}
   		}
		my_html << "</tr>" << endl;
		my_html << "<tr>" << endl;
		while (getline(file2, str))
   		{
				if (str == "===================="){
					it_is_heading_of_homework = -1;
					if (we_are_entering_for_first_time_in_while2){
						getline(file2, str);
						getline(file2, str);
					}
					getline(file2, str);
					we_are_entering_for_first_time_in_while2 = 0;
					my_html << "<td>";
					while ((str != "====================") && (str != "end of file"))
					{
						if (it_is_heading_of_homework == 1)
						{
							my_html << "<div id=\"heading_hw\">" << str << "</div>" << endl;
							it_is_heading_of_homework = 0;
						}
						else if (it_is_heading_of_homework == 0)
						{
							my_html << "<div id=\"data_hw\">" << str << "</div>" << endl;
						}
						if (str.length() == 0)
						{
							it_is_heading_of_homework = 1;
							my_html << str << "<br>" << endl;
						}
						getline(file2, str);
						//my_html << "<div id=\"heading_hw\">" << str << "</div>" << endl;
					}
					
					my_html << "</td>" << endl;
				}
   		}
		my_html << "</tr>" << endl;
		my_html << "</table></p><img src=\"programata.png\" style=\"width:2589px; height:262px;\" alt=\"учебната програма трябваше да е тук\" /><p><embed src=clock.swf width=150 height=50 wmode=transparent type=application/x-shockwave-flash></embed><p id=\"bottom-text\">©2014 11b 2014-2015 HomeWorks page made by David Georgiev</p></body></html>" << endl;
		my_second_html << "<p><embed src=clock.swf width=150 height=50 wmode=transparent type=application/x-shockwave-flash></embed><p id=\"bottom-text\">©2014 11b 2014-2015 HomeWorks page made by David Georgiev</p></body></html>";
		my_html.close();
		my_second_html.close();
	}
	void print()
	{
		ofstream myfile_;
		ifstream file("txt/HomeWorks.txt");
		myfile_.open ("txt/HomeWorks-updated.txt");
    		string str; 
		bool date_exist = 0;
		bool date_before = 0;
		int year_int;
		int month_int;
		int day_int;
		int my_year_int;
		int my_month_int;
		int my_day_int;
    		while (getline(file, str))
   		{
			if (str != "===================="){
				myfile_ << str << endl;
			}
     			else
			{
				getline(file, str);
				if (date_ == str)
				{
					date_exist = 1;
					myfile_ << "====================" << endl;
					myfile_ << str << endl;
					getline(file, str);
					myfile_ << str << endl;
					myfile_ << endl << subject_ << endl;
					myfile_ << data_ << endl;
					//cout << "Датата съвпада" << endl;
				}
				else
				{
					//cout << "str = " << str << endl << "date_ = " << date_ << endl;
					string strdate = str.substr(str.size() - 10);
					stringstream(strdate.substr(6,4)) >> year_int;
					stringstream(strdate.substr(3,2)) >> month_int;
					stringstream(strdate.substr(0,2)) >> day_int;
					string my_strdate = date_.substr(date_.size() - 10);
					stringstream(my_strdate.substr(6,4)) >> my_year_int;
					stringstream(my_strdate.substr(3,2)) >> my_month_int;
					stringstream(my_strdate.substr(0,2)) >> my_day_int;
					//cout << year_int << month_int << day_int << endl << my_year_int << my_month_int << my_day_int << endl;
					if (((year_int > my_year_int) ||  ((year_int == my_year_int) && (month_int > my_month_int)) || ((year_int == my_year_int) && (month_int == my_month_int) && (day_int > my_day_int))) && ((date_before == 0) && (date_exist == 0))){
						myfile_ << "====================" << endl << date_ << endl << "====================" << endl;
						myfile_ << endl << subject_ << endl;
						myfile_ << data_ << endl << endl;
						myfile_ << "====================" << endl << str << endl << "====================" << endl;
						getline(file, str);
						date_before = 1;
					}
					else
					{
						myfile_ << "====================" << endl << str << endl << "====================" << endl;
						getline(file, str);
					}
				}
			}
   		}
		if ((date_before == 0) && (date_exist == 0))
		{
			myfile_ << "====================" << endl << date_ << endl << "====================" << endl;
			myfile_ << endl << subject_ << endl;
			myfile_ << data_ << endl << endl;
		}
		myfile_.close();
		ifstream file2("txt/HomeWorks-updated.txt");
		myfile_.open ("txt/HomeWorks.txt");

		time_t now = time(0);
		char* dt = ctime(&now);

		myfile_ << "Най-съществените задачи - по срок на изпълнение:" << endl << "ПОСЛЕДНО АКТУАЛИЗИРАНЕ - " << dt << endl;
		int line_counter = 0;
		while (getline(file2, str))
   		{
			line_counter++;
			if ((line_counter >= 4) && (str != "end of file"))
			{
				myfile_ << str << endl;
			}
   		}
	}
};

void copy_history(ifstream &history_file, ofstream &temp_file)
{
	string current_line;
	getline(history_file, current_line);
	while (current_line != "end of file")
	{
		temp_file << current_line << endl;
		getline(history_file, current_line);
	}
}

int main()
{
	cout << "ВНИМАНИЕ: за да работи правилно програмата ако я пускате за пръв път трябва да имате файл \"txt/HomeWorks.txt\" с три празни реда в него ако нямате го създайте и пуснете програмата наново!" << endl << endl;
	ofstream myfiletemp;
	ifstream input_file("txt/input.txt");
	ifstream input_history_file("history/history.txt");
	ofstream temp_file;
	temp_file.open ("history/HomeWorks-temp.txt");
	copy_history(input_history_file,temp_file);
	temp_file << "end of file" << endl;
	temp_file.close();
	string current_line;
	myfiletemp.open ("history/history.txt");
	time_t now = time(0);
	string dt = ctime(&now);
	myfiletemp << "Най-съществените задачи - по срок на изпълнение:" << endl << "ПОСЛЕДНО АКТУАЛИЗИРАНЕ - " << dt << endl;
	
	string date;
	string data;
	string subject;
	ofstream myfile;
	bool again = 1;
	bool remove_file = 1;
	bool import = 0;
	bool just_convert = 0;
	bool charset = 0;
	HomeWork hw("ЗА ПЕТЪК 28.11.2014","Напишете програма","Операционни системи");
	cout << "Ако искате просто да конвертирате \"txt/HomeWorks.txt\" в HTML въведете 1 ако не - 0" << endl;
	cin >> just_convert;
	cin.clear();
	cin.ignore(std::numeric_limits<std::streamsize>::max(), '\n');
	if (just_convert == 0)
	{
		cout << "За импортиране от файла \"txt/input.txt\" въведете 1, за въвеждане - 0" << endl;
		cin >> import;
		cin.clear();
		cin.ignore(std::numeric_limits<std::streamsize>::max(), '\n');
		if (import == 1)
		{
			while (getline(input_file, current_line))
			{
				hw.set_date(current_line);
				getline(input_file, current_line);
				hw.set_subject(current_line);
				getline(input_file, current_line);
				hw.set_data(current_line);
				hw.print();
				myfiletemp << "====================" << endl;
				myfiletemp << hw.get_date() << endl;
				myfiletemp << "====================" << endl << endl;
				myfiletemp << hw.get_subject() << endl;
				myfiletemp << hw.get_data() << endl << endl;

			}
		}
		else
		{
			while(again == 1){
				cout << "Въведете датата на домашното: ";
				getline (cin,date);
				hw.set_date(date);
				cout << "Въведете предмета: ";
				getline (cin,subject);
				hw.set_subject(subject);
				cout << "Въведете домашното: ";
				getline (cin,data);
				hw.set_data(data);
				hw.print();

				myfiletemp << "====================" << endl;
				myfiletemp << hw.get_date() << endl;
				myfiletemp << "====================" << endl << endl;
				myfiletemp << hw.get_subject() << endl;
				myfiletemp << hw.get_data() << endl << endl;

				cout << "Искате ли да добавите ново домашно - въведете 1 за \"да\" и 0 за \"не\"" << endl;
				cin >> again;
				cin.clear();
				cin.ignore(std::numeric_limits<std::streamsize>::max(), '\n');
			}
		}
	}
	string temp_current_line;
	ifstream temp_file_to_write_in_history("history/HomeWorks-temp.txt");
	getline(temp_file_to_write_in_history, temp_current_line);
	getline(temp_file_to_write_in_history, temp_current_line);
	getline(temp_file_to_write_in_history, temp_current_line);
	copy_history(temp_file_to_write_in_history,myfiletemp);
	myfiletemp << "end of file" << endl;
	myfiletemp.close();
	//cout << "Ако нямате нищо против да изтриете файла txt/HomeWorks-updated.txt, който съвпада с другия въведете 1" << endl;
	//cin >> remove_file;
	if (remove_file == 1){
		if(remove( "txt/HomeWorks-updated.txt") != 0 ){cout << "Error deleting temp file1" << endl;}else{cout << "temp file1 is deleted" << endl;}
		if(remove( "history/HomeWorks-temp.txt") != 0 ){cout << "Error deleting temp file2" << endl;}else{cout << "temp file2 is deleted" << endl;}
	}
	cout << "Thanks for using this program" << endl << "Bye! :)" << endl;
	myfile.open ("txt/HomeWorks.txt", ios::app);
	myfile << "end of file";
	myfile.close();
	cout << "In which charset you want the HTML file - type 1 for \"windows-1251\" or 0 for \"UTF-8\"" << endl;
	cin >> charset;
	cin.clear();
	cin.ignore(std::numeric_limits<std::streamsize>::max(), '\n');
	const char* indexhtml = "html/index.html";
	const char* html1 = "html/1.html";
	const char* input_txt = "txt/HomeWorks.txt";
	hw.make_html(charset,input_txt,indexhtml,html1);
	const char* indexhtml_2 = "html/history.html";
	const char* html1_2 = "html/history2.html";
	const char* input_txt_2 = "history/history.txt";
	hw.make_html(charset,input_txt_2,indexhtml_2,html1_2);
	return 0;
}
