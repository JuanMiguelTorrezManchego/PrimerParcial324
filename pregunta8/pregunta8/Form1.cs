using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;
using System.Data;

namespace pregunta8
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            ServiceReference1.WebService1SoapClient sw = new ServiceReference1.WebService1SoapClient();
            dataGridView1.DataSource = sw.persona().Tables[0];
        }

        private void button1_Click(object sender, EventArgs e)
        {
            ServiceReference2.WebService1SoapClient sw1 = new ServiceReference2.WebService1SoapClient();
            sw1.editar(textBox1.Text,textBox2.Text,textBox3.Text,textBox4.Text);
            ServiceReference1.WebService1SoapClient sw = new ServiceReference1.WebService1SoapClient();
            dataGridView1.DataSource = sw.persona().Tables[0];
            
        }
        
        public void editar(string ci, string nom, string fecnac, string dep)
        {
            SqlConnection con = new SqlConnection();
            SqlCommand cmd = new SqlCommand();
            con.ConnectionString = "server=(local);database=mibasemigueltorrezmanchego;user=ejemplo324;pwd=123456";
            con.Open();
            cmd.Connection = con;
            cmd.CommandText = "update persona set nombrecompleto='" + nom + "',fechanacimiento= '" + fecnac + "',departamento ='" + dep + "' where ci='" + ci + "'";
            cmd.ExecuteNonQuery();
            
            con.Close();
        }
        public void cargar(string ci, string nom, string fecnac, string dep)
        {
            SqlConnection con = new SqlConnection();
            SqlCommand cmd = new SqlCommand();
            con.ConnectionString = "server=(local);database=mibasemigueltorrezmanchego;user=ejemplo324;pwd=123456";
            con.Open();
            cmd.Connection = con;
            cmd.CommandText = "insert into persona values('" + ci + "','" + nom + "','" + fecnac + "','" + dep + "')";
            cmd.ExecuteNonQuery();
            con.Close();
        }

        public void eliminar(string ci, string nom, string fecnac, string dep)
        {
            SqlConnection con = new SqlConnection();
            SqlCommand cmd = new SqlCommand();
            con.ConnectionString = "server=(local);database=mibasemigueltorrezmanchego;user=ejemplo324;pwd=123456";
            con.Open();
            cmd.Connection = con;
            cmd.CommandText = "delete from persona where ci= '" + ci + "'";
            cmd.ExecuteNonQuery();
            con.Close();

        }

        private void button2_Click(object sender, EventArgs e)
        {
            ServiceReference2.WebService1SoapClient sw1 = new ServiceReference2.WebService1SoapClient();
            sw1.eliminar(textBox1.Text, textBox2.Text, textBox3.Text, textBox4.Text);
            ServiceReference1.WebService1SoapClient sw = new ServiceReference1.WebService1SoapClient();
            dataGridView1.DataSource = sw.persona().Tables[0];
        }

        private void button3_Click(object sender, EventArgs e)
        {
            ServiceReference2.WebService1SoapClient sw1 = new ServiceReference2.WebService1SoapClient();
            sw1.cargar(textBox1.Text, textBox2.Text, textBox3.Text, textBox4.Text);
            ServiceReference1.WebService1SoapClient sw = new ServiceReference1.WebService1SoapClient();
            dataGridView1.DataSource = sw.persona().Tables[0];
        }
    }
}
